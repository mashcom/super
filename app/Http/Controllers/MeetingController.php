<?php

namespace App\Http\Controllers;

use App\Mail\MeetingRequested;
use App\Mail\MeetingStatusUpdated;
use App\Models\Conversation;
use App\Models\Meeting;
use App\Models\Placement;
use App\Models\User;
use App\Repositories\MessagingRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Mail;

class MeetingController extends Controller
{
    private $_messagingRepository;

    public function __construct(MessagingRepository $messagingRepository)
    {
        $this->_messagingRepository = $messagingRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {


        $meetings = Meeting::with('message.sender', 'message.conversation.student', 'message.conversation.supervisor')->get();

        if (!empty(auth()->user()->student_id)) {
            $meetings = $meetings->filter(function ($meeting) {
                return $meeting?->message?->conversation?->student_id === auth()->user()->student_id;
            });
        }
        return view('student.meetings', compact('meetings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'start_date' => 'required|date|after_or_equal:today',
            'start_time' => 'required',
            'end_time' => 'required|after:start_time',
            'additional_details' => 'max:255',
        ], [
            'start_date.required' => 'Please enter a valid start date.',
            'start_time.required' => 'Please enter a valid start time.',
            'end_time.required' => 'Please enter a valid end time.',
            'end_time.after' => 'End time must be after start time.',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $placement = Placement::find($request->placement_id);
        $student_id = $placement->student_id;

        $conversation = $this->_messagingRepository->get_conversation($student_id, $request->input("supervisor_id"));
        $conversation_id = $conversation->id;
        //create the message
        $message_body = ($request->additional_details) ? $request->additional_details : "Meeting Scheduled";
        $message = $this->_messagingRepository->create_message(auth()->id(), $conversation_id, $message_body);

        //add the meeting
        $new_meeting = new Meeting();
        $new_meeting->message_id = $message->id;
        $new_meeting->scheduled_date = date('Y-m-d', strtotime($request->start_date));
        $new_meeting->start_time = $request->start_time;
        $new_meeting->end_time = $request->end_time;
        $new_meeting->accepted = 0;
        $new_meeting->save();

        $new_meeting->additional_details = $request->additional_details;


        $conversation = Conversation::findOrFail($conversation_id);

        $email_to = (auth()->id() == $conversation->student_id) ? $conversation->student_id : $conversation->supervisor_id;
        $user = User::find($email_to);

        Mail::to($user->email)
            ->send(new MeetingRequested($user, $new_meeting));

        return response()->json(["success" => true]);


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id, Request $request)
    {
        $accept = $request->input("accept");
        Meeting::where("id", $id)->update(["accepted" => $accept]);
        $meeting = Meeting::with('message.conversation.student','message.conversation.supervisor')
        ->findOrFail($id);

        $student_email = $meeting?->message?->conversation?->student?->regnum."@students.msuas.ac.zw";
        $supervisor_email = $meeting?->message?->conversation?->supervisor->email;
       
        Mail::to([$student_email,$supervisor_email])
        ->send(new MeetingStatusUpdated( $meeting));
        //dd($student_email);
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

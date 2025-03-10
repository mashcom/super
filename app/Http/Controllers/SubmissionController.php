<?php

namespace App\Http\Controllers;

use App\Mail\DocumentSubmitted;
use App\Mail\MessageSend;
use App\Mail\RoleAllocated;
use App\Models\Conversation;
use App\Models\Placement;
use App\Models\Student;
use App\Models\User;
use App\Repositories\DocumentBuilder;
use App\Repositories\MessagingRepository;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SubmissionController extends Controller
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
        $conversation = $this->_messagingRepository->get_conversation($request->student_id, supervisor_id: $request->user_id);
        $conversation_id = $conversation->id;

        $placement = Placement::where("student_id", $request->student_id)->firstOrFail();

        return redirect("submission/$placement->id");
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

        // dd($request->all());

        $this->validate($request, [
            //'name'=> 'required',
            //'document_type'=> 'required',
            'additional_details' => 'max:255',
            // 'file' => 'required|mimes:pdf,doc,docx|max:204800',
        ]);

        $placement = Placement::with('placement_supervisor')->find($request->placement_id);
        $student_id = $placement->student_id;

        $is_student = (auth()->user()->student_id > 0);

        $supervisor_id = $request->supervisor_id;

        $conversation = $this->_messagingRepository->get_conversation($student_id, $supervisor_id);
        $conversation_id = $conversation->id;
        //create the message

        $message = $this->_messagingRepository->create_message(auth()->id(), $conversation_id, $request->additional_details);
        if (!$request->hasFile('file')) {
            //return response()->json(["success" => true]);// 

            $student = Student::find($student_id);
            $supervisor = User::find($supervisor_id);

            Mail::to(["$student->regnum@students.msuas.ac.zw", $supervisor->email])
                ->send(new MessageSend($message));

            return redirect("submission/$request->placement_id");
        }
        //upload document
        $file = $request->file('file');
        $document_upload_path = $this->_messagingRepository->upload_file($file);
        $extension = $file->getClientOriginalExtension();

        //prepare the document
        $builder = new DocumentBuilder();
        $document = $builder
            ->withMessageId($message->id)
            ->withFilename($request->name)
            ->withDescription($request->additional_details)
            ->withDocumentType($request->document_type)
            ->withFileType($extension)
            ->withFilePath($document_upload_path)
            ->build();

        $document_details = $this->_messagingRepository->attach_document($document);

        $email_to = $placement->placement_supervisor?->user?->email;

        $user = User::findOrFail($request->supervisor_id);
        Mail::to($user->email)
            ->send(new DocumentSubmitted($user, $request->all(), $document_details));

        return response()->json(["success" => true]);
        //return redirect("submission/$request->placement_id");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $placement_id)
    {
        $placement = Placement::findOrFail($placement_id);
        $student = Student::with('programme_details')->where('id', $placement->student_id)->firstOrFail();
        $student = Student::where('regnum', $student->regnum)
            ->with('placement.work_supervisor')
            ->with('placement.placement_supervisor.user')
            ->first();

        $student_conversation = Conversation::where('student_id', $student->id)->first();
        $conversation = $this->_messagingRepository->get_conversation_by_id($student_conversation->id);
        $is_student = auth()->user()->student_id > 0;
        //dd($is_student);
        if ($is_student) {
            $conversation->chatting_with = $student?->placement?->placement_supervisor?->user?->name;
            $conversation->chatting_email = $student?->placement?->placement_supervisor?->user?->email;
        }
        return view("submission.show", compact("student", "conversation", "is_student"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $placement_id)
    {
        $placement = Placement::findOrFail($placement_id);
        $student = Student::findOrFail($placement->student_id);
        $student = Student::where('regnum', $student->regnum)
            ->with('placement.work_supervisor')
            ->with('placement.placement_supervisor.user')
            ->first();

        $student_conversation = Conversation::where('student_id', $student->id)->first();
        $conversation = $this->_messagingRepository->get_conversation_by_id($student_conversation->id);
        return view("submission.create", compact("student", "conversation"));
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

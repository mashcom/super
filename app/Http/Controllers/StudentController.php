<?php

namespace App\Http\Controllers;

use App\Mail\DocumentStatusUpdate;
use App\Models\Conversation;
use App\Models\DocumentAcceptance;
use App\Models\PlacementSupervisor;
use App\Models\User;
use App\Models\Document;
use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;


class StudentController extends Controller
{
    public function index(Request $request)
    {
        if (!empty(auth()->user()->student_id)) {
            $student = Student::find(auth()->user()->student_id);
            return redirect(url("student/" . $student->regnum));
        }

        $user_id = auth()->user()->id;
        if (auth()->user()->is_admin == 1) {
            $students = Student::with('placement', 'programme_details.department');
        } else {
            $student_ids = collect(DB::select('SELECT placements.student_id
                                        FROM placement_supervisors ps
                                        INNER JOIN placements ON placements.id = ps.placement_id
                                        WHERE ps.user_id=? OR ps.coordinator_id=? OR ps.chairperson_id=?', [$user_id, $user_id, $user_id]));

            $ids = [];
            foreach ($student_ids as $key => $id) {
                array_push($ids, $id->student_id);
            }

            $students = Student::whereIn('id', $ids)->with('placement');
        }

        if ($request->q) {
            $students = $students->where('regnum', 'like', '%' . $request->q . '%')->paginate(100);
        } else {
            $students = $students->paginate(100);
        }


        return view("student.index", compact("students"));
    }


    public function edit(Request $request, $regnum)
    {

        $student = Student::where('regnum', $regnum)
            ->with('placement.work_supervisor')
            ->with('placement.placement_supervisor.user')
            ->first();


        $page_to_display = "student.placement";
        $users = collect([]);
        if ($request->page == "supervisor")
            $page_to_display = "student.work_supervisor";
        if ($request->page == "university_supervisor") {
            $page_to_display = "student.university_supervisor";
            $users = User::whereNull("student_id")
                ->orderBy("name", "desc")
                ->get();
        }

        $all_request = $request->all();

        $title = '';
        if (@$all_request['target'] == 1)
            $title = "Supervisor";
        elseif (@$all_request['target'] == 2)
            $title = "Coordinator";
        elseif (@$all_request['target'] == 3)
            $title = "Chairperson";

        return view($page_to_display, compact("student", "users", "title"));
    }

    public function show(Request $request, $regnum)
    {



        if ($request->approval) {
            // dd($request->all());
            $request->validate([
                'document_id' => 'required',
                'level' => 'required',
                'accepted' => 'required',
            ]);

            $approval = new DocumentAcceptance();
            $approval->document_id = $request->document_id;
            $approval->type = $request->level;
            $approval->status = $request->accepted == 1 ? "Accepted" : "Rejected";
            $approval->comment = $request->comment;
            if ($approval->save()) {
                $document = Document::find($request->document_id);
                if ($request->level == 'Supervisor') {

                    $document->accepted = $request->accepted;
                    $document->comment = $request->comment;
                    $document->save();

                }
                $user = User::find(auth()->user()->id);
                Mail::to("$regnum@students.msuas.ac.zw")->send(new DocumentStatusUpdate($user, $document, $approval));

                return back()->with("success", "Approval status updated");
            }
        }
        $student = Student::where('regnum', $regnum)
            ->with('placement.work_supervisor')
            ->with('placement.placement_supervisor.user')
            ->with('placement.project')
            ->with('programme_details.department.chairperson')
            ->with('programme_details.department.coordinator')
            ->first();

        $chair_person = $student?->programme_details?->department?->chairperson;
        $coordinator = $student?->programme_details?->department?->coordinator;

        if ($chair_person) {
            $placement = PlacementSupervisor::where('placement_id', $student?->placement?->id)->first();
            if ($placement) {
                $placement->chairperson_id = $chair_person->user_id;
                $placement->save();
            }
        }

        if ($coordinator) {
            $placement = PlacementSupervisor::where('placement_id', $student?->placement?->id)->first();
            if ($placement) {
                $placement->coordinator_id = $coordinator->user_id;
                $placement->save();
            }
        }

        $conversation = Conversation::with("messages")
            ->with("messages.document.acceptance")
            ->where('student_id', $student->id)
            ->where('supervisor_id', $student?->placement?->placement_supervisor?->user?->id)
            ->first();


        $is_student = auth()->user()->student_id > 0;

        $view = ($request->only_documents) ? "student.documents" : "student.show";
        return view($view, compact("student", "is_student", "conversation"));
    }

}

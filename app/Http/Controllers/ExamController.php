<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateQuestionRequest;
use App\Http\Requests\UpdateQuestionRequest;
use App\Repositories\QuestionRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use Illuminate\Support\Facades\DB;
use App\Models\TeacherGroup;
use App\Models\Exam;

class ExamController extends AppBaseController
{
    public function getExams(Request $request)
    {
        $exams = Exam::get();
        
        foreach($exams as $exam){
            $groups = [];
            foreach(json_decode($exam->teacher_group_id) as $id){
                $teacher_groups = TeacherGroup::where('id',$id)->first()->name;
                array_push($groups,$teacher_groups);
                $exam->teacher_groups = json_encode($groups);
            }
        }
        
            return view('admin_exams.index')
            ->with('exams', $exams);
    }

    public function createExams(Request $request)
    {
        $user = auth()->user();
        if ($user->role_id  == 1) {
            $teacher_groups = TeacherGroup::get();
            return view('admin_exams.create')
                ->with('teacher_groups', $teacher_groups);
        } else if ($user->role_id  == 2) {
            $teacher_groups = TeacherGroup::where('school_id',$user->school_id)->get();
            return view('admin_exams.create')
                ->with('teacher_groups', $teacher_groups);
        }
    }

    public function storeExams(Request $request)
    {
        $exam = new Exam;
        $exam->name = $request->name;
        $exam->teacher_group_id = json_encode($request->ids);
        $exam->start_time = strtotime($request->start_time);
        $exam->end_time = strtotime($request->start_time);
        $exam->save();
        
        Flash::success('Exams created successfully.');

        $exams = Exam::get();
        
        foreach($exams as $exam){
            $groups = [];
            foreach(json_decode($exam->teacher_group_id) as $id){
                $teacher_groups = TeacherGroup::where('id',$id)->first()->name;
                array_push($groups,$teacher_groups);
                $exam->teacher_groups = json_encode($groups);
            }
        }
        return view('admin_exams.index')
            ->with('exams', $exams);
    }
}

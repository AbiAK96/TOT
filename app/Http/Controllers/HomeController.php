<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\School;
use App\Models\User;
use App\Models\TeacherGroup;
use App\Models\Exam;
use App\Models\Book;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->role_id == 1) {
            $user = auth()->user();
            $count = [];
            $count['schools'] = School::where('id','!=',$user->school_id)->get()->count();
            $count['teachers'] = User::where('id','!=',$user->id)->where('role_id',3)->get()->count();
            $count['teacher_groups'] = TeacherGroup::get()->count();
            $count['exams'] = Exam::get()->count();
            $count['books'] = Book::get()->count();
            $count['admins'] = User::where('role_id',2)->get()->count();
            $count['requests'] = DB::table('requests')->where('school_id', $user->school_id)->where('status',false)->get()->count();
            $count['results'] = DB::table('results')->where('teacher_id', $user->id)->get();
            $count['avg_mark'] = 0;
            $count['upcoming_exam'] = DB::table('draft_exams')->where('teacher_id',$user->id)->where('status',false)->where('marked',false)->get()->count();

            return view('home')->with('count',$count);
        } else if (auth()->user()->role_id == 2) {
            $user = auth()->user();
            $count = [];
            $count['schools'] = School::get()->count();
            $count['teachers'] = User::where('school_id',$user->school_id)->where('id','!=',$user->id)->get()->count();
            $count['teacher_groups'] = TeacherGroup::where('school_id',$user->school_id)->get()->count();
            $count['exams'] = Exam::get()->count();
            $count['books'] = Book::get()->count();
            $count['admins'] = Book::get()->count();
            $count['requests'] = DB::table('requests')->where('school_id', $user->school_id)->where('status',false)->get()->count();
            $count['upcoming_exam'] = DB::table('draft_exams')->where('teacher_id',$user->id)->where('status',false)->where('marked',false)->get()->count();
            $count['results'] = DB::table('results')->where('teacher_id', $user->id)->get();
            $count['avg_mark'] = 0;
            return view('home')->with('count',$count);
        }
        $user = auth()->user();
        $count = [];
        $count['schools'] = School::get()->count();
        $count['teachers'] = User::get()->count();
        $count['teacher_groups'] = TeacherGroup::get()->count();
        $count['exams'] = Exam::get()->count();
        $count['books'] = Book::get()->count();
        $count['admins'] = Book::get()->count();
        $count['results'] = DB::table('results')->where('teacher_id', $user->id)->get();
        
        $results = DB::table('results')->where('teacher_id', $user->id)->get();
        $results_count = DB::table('results')->where('teacher_id', $user->id)->get()->count();
        $avg = 0;
        $count['avg_mark'] = 0;
        if  ($results != null) {
            foreach ($results as $result) {
                $avg = $avg + $result->result;
            }
            $avg_mark = $avg/$results_count;
            $count['avg_mark'] = number_format((float)$avg_mark, 1, '.', '');
        }

        $today = date('Y-m-d H:i:s');
        $count['requests'] = DB::table('requests')->where('teacher_id', $user->id)->where('status',false)->get()->count();
        $count['upcoming_exam'] = DB::table('draft_exams')->where('start_time','>=',$today)->where('status',false)->where('marked',false)->where('teacher_id',$user->id)->get()->count();
        return view('home')->with('count',$count);
    }
}

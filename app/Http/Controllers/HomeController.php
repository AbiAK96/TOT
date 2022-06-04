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
            return view('home')->with('count',$count);
        }
        $count = [];
        $count['schools'] = School::get()->count();
        $count['teachers'] = User::get()->count();
        $count['teacher_groups'] = TeacherGroup::get()->count();
        $count['exams'] = Exam::get()->count();
        $count['books'] = Book::get()->count();
        $count['admins'] = Book::get()->count();
        return view('home')->with('count',$count);
    }
}

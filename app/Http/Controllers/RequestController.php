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
use App\Models\User;

class RequestController extends AppBaseController
{
    public function index(Request $request)
    {
        $teacher_id = auth()->user()->id;
        $requests = DB::table('requests')
                    ->where('teacher_id', $teacher_id)
                    ->orderBy('id', 'desc')
                    ->get();
            return view('teacher_requests.index')
            ->with('requests', $requests);
    }

    public function create()
    {
        return view('teacher_requests.create');
    }

    public function make(Request $request)
    {
        $teacher_id = auth()->user()->id;
        if ($request->subject != null && $request->description != null) {
            DB::table('requests')->insert([
                'teacher_id' => $teacher_id,
                'school_id' => auth()->user()->school_id,
                'subject' => $request->subject,
                'description' => $request->description
            ]);
            
            Flash::success('Request saved successfully.');

            $requests = DB::table('requests')
                            ->where('teacher_id', $teacher_id)
                            ->orderBy('id', 'desc')
                            ->get();
            return view('teacher_requests.index')
            ->with('requests', $requests);
        }

        Flash::error('Cannot make requests.');

        $requests = DB::table('requests')
                        ->where('teacher_id', $teacher_id)
                        ->orderBy('id', 'desc')
                        ->get();
            return view('teacher_requests.index')
            ->with('requests', $request);
    }

    public function indexadmin(Request $request)
    {
        $school_id = auth()->user()->school_id;
        $requests = DB::table('requests')
                    ->where('school_id', $school_id)
                    ->orderBy('id', 'desc')
                    ->get();
        foreach($requests as $request){
            $teacher = User::where('id',$request->teacher_id)->first();
            $request->teacher = $teacher;

        }
            return view('admin_requests.index')
            ->with('requests', $requests);
    }

    public function approve(Request $request)
    {
        $school_id = auth()->user()->school_id;
        $requests = DB::table('requests')->where('id', $request->id)->update([
            'status' => true
        ]);
        
        $requests = DB::table('requests')
                        ->where('school_id', $school_id)
                        ->orderBy('id', 'desc')
                        ->get();
        foreach($requests as $request){
            $teacher = User::where('id',$request->teacher_id)->first();
            $request->teacher = $teacher;

        }
            return view('admin_requests.index')
            ->with('requests', $requests);
    }

    public function show(Request $request)
    {
        $request = DB::table('requests')
                        ->where('id', $request->id)
                        ->first();
        $teacher = User::where('id',$request->teacher_id)->first();
        $request->teacher = $teacher->first_name .' '. $teacher->last_name;

            return view('admin_requests.show')
            ->with('request', $request);
    }
}

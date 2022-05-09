<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Models\TeacherGroup;
use App\Models\User;
use App\Jobs\SaveGroupTragetsJobs;

class TeacherGroupController extends AppBaseController
{

    public function getTeacherGroups(Request $request)
    {
        $teacher_groups = TeacherGroup::get();
        return view('teacher_groups.index')
            ->with('teacher_groups', $teacher_groups);
    }

    public function create()
    {
        $teachers = User::where('role_id',3)->get();
        return view('teacher_groups.create')->with('teachers',$teachers);
    }

    public function storeTeacherGroups(Request $request)
    {
        $teacher_group = new TeacherGroup;
        $teacher_group->name = $request->group_name;
        $teacher_group->save();
        $teacher_group_id = $teacher_group->id;
        foreach($request->ids as $id){
            $createTarget = (new SaveGroupTragetsJobs($id,$teacher_group_id));
            dispatch($createTarget);
        }

        Flash::success('Teacher Group created successfully.');

        $teachers = User::where('role_id',3)->get();
        return view('teacher_groups.create')->with('teachers',$teachers);
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Models\TeacherGroup;
use App\Models\TeacherType;
use App\Models\User;
use App\Jobs\SaveGroupTragetsJobs;
use Illuminate\Support\Facades\DB;

class TeacherGroupController extends AppBaseController
{

    public function getTeacherGroups(Request $request)
    {
        $teacher_groups = TeacherGroup::where('school_id',auth()->user()->school_id)->get();
        return view('teacher_groups.index')
            ->with('teacher_groups', $teacher_groups);
    }

    public function create()
    {
        $teachers = User::where('role_id',3)->where('school_id',auth()->user()->school_id)->where('teacher_type_id',1)->get();
        $teacher_types = TeacherType::get();
        return view('teacher_groups.create')->with('teachers',$teachers)->with('teacher_types',$teacher_types);
    }

    public function storeTeacherGroups(Request $request)
    {
        if ($request->ids != null && $request->group_name != null) {
            $teacher_group = new TeacherGroup;
            $teacher_group->name = $request->group_name;
            $teacher_group->school_id = auth()->user()->school_id;
            $teacher_group->save();
            $teacher_group_id = $teacher_group->id;
            foreach($request->ids as $id){
                $createTarget = (new SaveGroupTragetsJobs($id,$teacher_group_id));
                dispatch($createTarget);
            }
    
            Flash::success('Teacher Group created successfully.');
    
            $teacher_groups = TeacherGroup::where('school_id',auth()->user()->school_id)->get();
            return view('teacher_groups.index')
                ->with('teacher_groups', $teacher_groups);
        }
        Flash::error('Please Enter group name and select a teacher');
        $teachers = User::where('role_id',3)->where('school_id',auth()->user()->school_id)->get();
        return view('teacher_groups.create')->with('teachers',$teachers);
    }

    public function searchTeachers(Request $request)
    {
        $teachers = User::searchTeacher($request); 
        $teacher_types = TeacherType::get();
        return view('teacher_groups.create')->with('teachers',$teachers)->with('teacher_types',$teacher_types);
    }

    public function destroy(Request $request)
    {
        $teacher_group = TeacherGroup::where('id',$request->id)->first();
        if (empty($teacher_group)) {
            Flash::error('Teacher group not found');
            return redirect(route('teacher_groups.index'));
        }
        $teacher_group->delete();
        Flash::success('Teacher group  deleted successfully.');
        return redirect(route('teacher_groups.index'));
    }

    public function getTargets(Request $request)
    {
        $targets = DB::table('group_targets')
                ->where('group_id', $request->id)
                ->get();
        $teacher_group = TeacherGroup::where('id',$request->id)->first();
        return view('teacher_groups.target')->with('targets',$targets)->with('teacher_group',$teacher_group);
    }
}

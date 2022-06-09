<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Repositories\UserRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Models\School;
use App\Models\User;
use App\Models\Role;
use App\Models\TeacherType;
use App\Http\Controllers\EmailVerificationController;
use Illuminate\Support\Facades\Hash;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends AppBaseController
{
    /** @var UserRepository $userRepository*/
    private $userRepository;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepository = $userRepo;
    }

    /**
     * Display a listing of the User.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $user = auth()->user();
        if ($user->role_id == 1) {
            $users = User::where('id','!=',$user->id)->get();
            $schools = School::where('id','!=',$user->id)->get();
        return view('users.index')
        ->with('users', $users)->with('schools', $schools);
        } else {
            $users = User::where('school_id',$user->school_id)->where('id','!=',$user->id)->get();
            $schools = School::where('id','!=',$user->id)->get();
        return view('users.index')
        ->with('users', $users)->with('schools', $schools);
        }
    }

    /**
     * Show the form for creating a new User.
     *
     * @return Response
     */
    public function create()
    {
        if (auth()->user()->role_id == 1) {
            $message = null;
            $schools = School::where('id','!=',1)->pluck('school_name', 'id')->prepend('Select a School', null);
            $roles = Role::where('id','!=',1)->pluck('name', 'id')->prepend('Select a Role', null);
            $teacher_types = TeacherType::pluck('name', 'id');
            return view('users.create')->with('schools', $schools)->with('roles', $roles)->with('message',$message)->with('teacher_types', $teacher_types);
        } elseif (auth()->user()->role_id == 2) {
            $user = auth()->user();
            $message = null;
            $schools = School::where('id',$user->school_id)->pluck('school_name', 'id');
            $roles = Role::where('id',3)->pluck('name', 'id');
            $teacher_types = TeacherType::pluck('name', 'id');
            return view('users.create')->with('schools', $schools)->with('roles', $roles)->with('message',$message)->with('teacher_types', $teacher_types);
        }
    }

    /**
     * Store a newly created User in storage.
     *
     * @param CreateUserRequest $request
     *
     * @return Response
     */
    public function store(CreateUserRequest $request)
    {
        if (auth()->user()->role_id ==1) {
            $input = $request->all();
            $email = User::getExistingEmail($request->email);
            if($email == false){
                Flash::error('Email is already taken');
                return redirect(route('users.create'));
            }
            $input['password'] = Hash::make($request['password']);
            $user = $this->userRepository->create($input);
            $email_verification = new EmailVerificationController;
            $email_verification->processData($request->email,$request->first_name,$request->password);
            Flash::success('Teacher saved successfully.');
    
            return redirect(route('users.index'));
        }
        $email = User::getExistingEmail($request->email);
        $domain = User::domainValidation($request);
            if(false == $email) {
                $user = auth()->user();
                $teacher_types = TeacherType::pluck('name', 'id');
                $schools = School::where('id',$user->school_id)->pluck('school_name', 'id');
                $roles = Role::where('id',3)->pluck('name', 'id');
                Flash::error('This email is already taken');
                return view('users.create')->with('schools', $schools)->with('roles', $roles)->with('teacher_types', $teacher_types);
            } else if(false == $domain){
                $user = auth()->user();
                $teacher_types = TeacherType::pluck('name', 'id');
                $schools = School::where('id',$user->school_id)->pluck('school_name', 'id');
                $roles = Role::where('id',3)->pluck('name', 'id');
                Flash::error('Please enter own domain email address');
                return view('users.create')->with('schools', $schools)->with('roles', $roles)->with('teacher_types', $teacher_types);
            }
        $request->role_id = 3;
        $request->school_id = auth()->user()->school_id;
        $input = $request->all();
        $input['password'] = Hash::make($request['password']);
        $user = $this->userRepository->create($input);
        $email_verification = new EmailVerificationController;
        $email_verification->processData($request->email,$request->first_name,$request->password);
        Flash::success('Teacher saved successfully.');
        return redirect(route('users.index'));
    }

    /**
     * Display the specified User.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('Teacher not found');

            return redirect(route('users.index'));
        }

        return view('users.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified User.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $user = $this->userRepository->find($id);
        if (empty($user)) {
            Flash::error('Teacher not found');

            return redirect(route('users.index'));
        }

        //return view('users.edit')->with('user', $user);

        if (auth()->user()->role_id == 1) {
            $message = null;
            $schools = School::pluck('school_name', 'id')->prepend('Select a School', null);
            $roles = Role::where('id','!=',1)->pluck('name', 'id')->prepend('Select a Role', null);
            $teacher_types = TeacherType::pluck('name', 'id');
            return view('users.edit')->with('schools', $schools)->with('roles', $roles)->with('message',$message)->with('user', $user)->with('teacher_types', $teacher_types);
        } elseif (auth()->user()->role_id == 2) {
            $message = null;
            $schools = School::where('id',$user->school_id)->pluck('school_name', 'id');
            $roles = Role::where('id',3)->pluck('name', 'id');
            $teacher_types = TeacherType::pluck('name', 'id');
            return view('users.edit')->with('schools', $schools)->with('roles', $roles)->with('message',$message)->with('user', $user)->with('teacher_types', $teacher_types);
        }
    }

    /**
     * Update the specified User in storage.
     *
     * @param int $id
     * @param UpdateUserRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUserRequest $request)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('Teacher not found');

            return redirect(route('users.index'));
        }
        $input = $request->all();
        $input['password'] = Hash::make($request['password']);
        $user = $this->userRepository->update($input, $id);

        Flash::success('Teacher updated successfully.');

        return redirect(route('users.index'));
    }

    /**
     * Remove the specified User from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('Teacher not found');

            return redirect(route('users.index'));
        }

        $this->userRepository->delete($id);

        Flash::success('Teacher deleted successfully.');

        return redirect(route('users.index'));
    }

    public function import(Request $request) 
    {
        if ($request->file == null) {
            Flash::error('Please select CSV file.');
            return redirect(route('users.index'));
        }
        $fileName = time().'_'.request()->file->getClientOriginalName();
        request()->file('file')->storeAs('reports', $fileName, 'public'); 
        
        $array = Excel::toArray(new UsersImport, request()->file('file'));
        //print_r($array);die();
        $school_id = auth()->user()->school_id;
        $respones = School::teachersEmailValidation($array);
        //print_r($respones['teachers']);die();
        if($respones['teachers'] != null){
            Flash::error('Please enter an email address with your own domain.'.str_replace('"', '', json_encode($respones['teachers'])));
            return redirect(route('users.index'));
        } else if ($respones['emails'] != null) {
            Flash::error('These emails are already taken.'.str_replace('"', '', json_encode($respones['emails'])));
            return redirect(route('users.index'));
        }
        $save = User::saveCSV($array,$school_id);
        Flash::success('Teacher Import successfully.');
        return redirect(route('users.index'));
    }

    public function downloadfile()
    {
        $filepath = public_path('sample_csv/teachers.xlsx');
        return Response::download($filepath); 
    }
}

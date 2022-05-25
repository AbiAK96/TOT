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
            return view('users.create')->with('schools', $schools)->with('roles', $roles)->with('message',$message);
        } elseif (auth()->user()->role_id == 2) {
            $user = auth()->user();
            $message = null;
            $schools = School::where('id',$user->school_id)->pluck('school_name', 'id');
            $roles = Role::where('id',3)->pluck('name', 'id');
            return view('users.create')->with('schools', $schools)->with('roles', $roles)->with('message',$message);
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
            $input['password'] = Hash::make($request['password']);
            $user = $this->userRepository->create($input);
            // $email_verification = new EmailVerificationController;
            // $email_verification->processData($request->email,$request->first_name,$request->password);
            Flash::success('User saved successfully.');
    
            return redirect(route('users.index'));
        }
        $email = User::getExistingEmail($request->email);
        $domain = User::domainValidation($request);
            if(false == $email) {
                $message = 'This email is already taken';
                $schools = School::pluck('school_name', 'id')->prepend('Select a School', null);
                $roles = Role::pluck('name', 'id')->prepend('Select a Role', null);
                return view('users.create')->with('schools', $schools)->with('roles', $roles)->with('message',$message);
            } else if(false == $domain){
                $message = 'Please enter own domain email address';
                $schools = School::pluck('school_name', 'id')->prepend('Select a School', null);
                $roles = Role::pluck('name', 'id')->prepend('Select a Role', null);
                return view('users.create')->with('schools', $schools)->with('roles', $roles)->with('message',$message);
            }
        $request->role_id = 3;
        $request->school_id = auth()->user()->school_id;
        $input = $request->all();
        //$input['school_id'] = auth()->user()->school_id;
        //$input['role_id'] = 3;
        $input['password'] = Hash::make($request['password']);
        $user = $this->userRepository->create($input);
        // $email_verification = new EmailVerificationController;
        // $email_verification->processData($request->email,$request->first_name,$request->password);
        Flash::success('User saved successfully.');

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
            Flash::error('User not found');

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
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        //return view('users.edit')->with('user', $user);

        if (auth()->user()->role_id == 1) {
            $message = null;
            $schools = School::pluck('school_name', 'id')->prepend('Select a School', null);
            $roles = Role::where('id','!=',1)->pluck('name', 'id')->prepend('Select a Role', null);
            return view('users.edit')->with('schools', $schools)->with('roles', $roles)->with('message',$message)->with('user', $user);
        } elseif (auth()->user()->role_id == 2) {
            $user = auth()->user();
            $message = null;
            $schools = School::where('id',$user->school_id)->pluck('school_name', 'id');
            $roles = Role::where('id',3)->pluck('name', 'id');
            return view('users.edit')->with('schools', $schools)->with('roles', $roles)->with('message',$message)->with('user', $user);
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
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        $user = $this->userRepository->update($request->all(), $id);

        Flash::success('User updated successfully.');

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
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        $this->userRepository->delete($id);

        Flash::success('User deleted successfully.');

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
        $school_id = auth()->user()->school_id;
        $teacher = School::teachersEmailValidation($array);
        if($teacher != null){
            Flash::error('Please enter an email address with your own domain.'.str_replace('"', '', json_encode($teacher)));
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

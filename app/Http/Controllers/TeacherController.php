<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTeacherRequest;
use App\Http\Requests\UpdateTeacherRequest;
use App\Repositories\TeacherRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Models\School;
use App\Models\Role;
use App\Models\TeacherTypes;

class TeacherController extends AppBaseController
{
    /** @var TeacherRepository $teacherRepository*/
    private $teacherRepository;

    public function __construct(TeacherRepository $teacherRepo)
    {
        $this->teacherRepository = $teacherRepo;
    }

    /**
     * Display a listing of the Teacher.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $teachers = $this->teacherRepository->all();
        //return $this->sendResponse($teachers, 'teachers',null);
        //print_r($teachers);die();

        return view('teachers.index')
            ->with('teachers', $teachers);
    }

    /**
     * Show the form for creating a new Teacher.
     *
     * @return Response
     */
    public function create()
    {
        //return view('teachers.create');

        $schools = School::pluck('school_name', 'id')->prepend('Select a School', '0');
        $roles = Role::pluck('name', 'id')->prepend('Select a Role', '0');
        $teacher_types = TeacherTypes::pluck('name', 'id')->prepend('Select a Type', '0');
        return view('teachers.create')->with('schools', $schools)->with('roles', $roles)
        ->with('teacher_types', $teacher_types);
    }

    /**
     * Store a newly created Teacher in storage.
     *
     * @param CreateTeacherRequest $request
     *
     * @return Response
     */
    public function store(CreateTeacherRequest $request)
    {
        $input = $request->all();

        $teacher = $this->teacherRepository->create($input);

        Flash::success('Teacher saved successfully.');

        return redirect(route('teachers.index'));

        // $email = User::getExistingEmail($request['email']);
        // $email_domain = Account::domainValidation($request);
        // if(null != $email){
        //     $message = 'Email is already taken';
        //     return $this->sendResponse(null, null, $message);
        // }else{
        //     if($email_domain == true){
        //         DB::beginTransaction();
        //         try {
        //             $account = new Account;
        //             $account->company_name      = $request['company_name'];
        //             $account->company_address   = $request['company_address'];
        //             $account->company_domain    = $request['company_domain'];
        //             $account->profile_image     = $request['profile_image']; 
        //             $account->save();

        //             // add last inserted account_id in user table.
        //             $user = new User;
        //             $user->account_id       = $account->id; // last inserted id
        //             $user->first_name       = $request['first_name'];
        //             $user->last_name        = $request['last_name'];
        //             $user->email            = $request['email'];
        //             $user->mobile_number    = $request['mobile_number'];
        //             $user->city             = $request['city'];
        //             $user->zip_code         = $request['zip_code'];
        //             $user->password         = Hash::make($request['password']);
        //             $user->username         = $user->email;
        //             $user->role_id          = 3;
        //             $user->save();

        //             DB::commit();
        //             $stripe = [];
        //             $stripe['email']     = $user->email;
        //             $stripe['name']      = $account->company_name;
        //             $stripe['phone']     = $user->mobile_number;
        //             $stripe['address']   = array("city" => $user->city,
        //                                         "postal_code" => $user->zip_code
        //             );
        //             $stripeCustomer = $account->createAsStripeCustomer($stripe);

        //             if(null != $user){
        //                 $email_verification = new EmailVerificationAPIController;
        //                 $email_verification->processData($request->email,$request->first_name);
        //             }

        //         } catch (\Exception $e) {
        //             DB::rollback();
        //             $message = 'User registration failed ';
        //             return $this->sendResponse(null, null, $message . $e->getMessage());
        //         }
        //     }else{
        //         return $this->sendResponse(null, null,'Please enter your own company domain.');
        //     }

        //         $result['account'] = $account->toArray();
        //         $result['user'] = $user->toArray();

        //         $message = 'User registration successfully, Please check your email inbox for instructions to verify your email';
        //         return $this->sendResponse($result, $message, null);
        // }
    }

    /**
     * Display the specified Teacher.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $teacher = $this->teacherRepository->find($id);

        if (empty($teacher)) {
            Flash::error('Teacher not found');

            return redirect(route('teachers.index'));
        }

        return view('teachers.show')->with('teacher', $teacher);
    }

    /**
     * Show the form for editing the specified Teacher.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $teacher = $this->teacherRepository->find($id);

        if (empty($teacher)) {
            Flash::error('Teacher not found');

            return redirect(route('teachers.index'));
        }
        $schools = School::pluck('school_name', 'id')->prepend('Select a School', '0');
        $roles = Role::pluck('name', 'id')->prepend('Select a Role', '0');
        $teacher_types = TeacherTypes::pluck('name', 'id')->prepend('Select a Type', '0');

        return view('teachers.edit')->with('schools', $schools)->with('roles', $roles)
        ->with('teacher_types', $teacher_types)->with('teacher', $teacher);

        //return view('teachers.edit')->with('teacher', $teacher);
    }

    /**
     * Update the specified Teacher in storage.
     *
     * @param int $id
     * @param UpdateTeacherRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTeacherRequest $request)
    {
        $teacher = $this->teacherRepository->find($id);

        if (empty($teacher)) {
            Flash::error('Teacher not found');

            return redirect(route('teachers.index'));
        }

        $teacher = $this->teacherRepository->update($request->all(), $id);

        Flash::success('Teacher updated successfully.');

        return redirect(route('teachers.index'));
    }

    /**
     * Remove the specified Teacher from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $teacher = $this->teacherRepository->find($id);

        if (empty($teacher)) {
            Flash::error('Teacher not found');

            return redirect(route('teachers.index'));
        }

        $this->teacherRepository->delete($id);

        Flash::success('Teacher deleted successfully.');

        return redirect(route('teachers.index'));
    }

    
}

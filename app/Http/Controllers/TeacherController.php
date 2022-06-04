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
use App\Models\Result;
use App\Models\Role;
use App\Models\User;
use App\Models\TeacherType;
use App\Models\SelectedQuestion;
use App\Models\Question;
use App\Models\QuestionTypes;
use App\Models\Book;
use Illuminate\Support\Facades\DB;
use \stdClass;
use Illuminate\Support\Facades\Hash;
use Storage;

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
        $teacher_types = TeacherType::pluck('name', 'id')->prepend('Select a Type', '0');
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
        $teacher_types = TeacherType::pluck('name', 'id')->prepend('Select a Type', '0');

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

    public function getExams(Request $request)
    {
        $teacher_id = auth()->user()->id;
        $exams = DB::table('draft_exams')
                    ->select('draft_exams.*')
                    ->where('teacher_id', $teacher_id)
                    ->get();
        
            return view('teacher_exams.index')
            ->with('exams', $exams);
    }

    public function getExamsQuestions(Request $request) 
    {
        $questions = Question::where('status',true)->get();
            return view('teacher_exams.start')
            ->with('questions', $questions);
    }

    public function storeResults(Request $request)
    {
        
        $teacher = auth()->user();
        $questions_count = Question::where('status',true)->count();
        if ($request->ids != null && count($request->ids) == $questions_count) {
            $count = 0;
            foreach ($request->ids as $key => $value) {
               $question = Question::where('id',$key)->first();
               if ($question->correct_answer  == $value) {
                   $count = $count + 1;
               }
           }
           $question_details = [];
           foreach ($request->ids as $key => $value) {
            $question = Question::where('id',$key)->first();
            if ($value == 1) {
                $choosed_answer  = $question->answer_one;
            } elseif ($value == 2) {
                $choosed_answer  = $question->answer_two;
            } elseif ($value == 3) {
                $choosed_answer  = $question->answer_three;
            } elseif ($value == 4) {
                $choosed_answer  = $question->answer_four;
            }
            if ($question->correct_answer == 1) {
                $correct_answer  = $question->answer_one;
            } elseif ($question->correct_answer == 2) {
                $correct_answer  = $question->answer_two;
            } elseif ($question->correct_answer == 3) {
                $correct_answer  = $question->answer_three;
            } elseif ($question->correct_answer == 4) {
                $correct_answer  = $question->answer_four;
            }
            
            $data = 
                array (
                    "question"          => $question->question,
                    "correct_answer"    => $correct_answer,
                    "choosed_answer"    => $choosed_answer
                );
                array_push($question_details,$data);

        }
           $question = Question::where('status',true)->first();
           $type = QuestionTypes::where('id',$question->question_type_id)->first()->name;
           $marks = $count/$questions_count *100;
           $result = new Result;
           $result->teacher_id = $teacher->id;
           $result->school_id = $teacher->school_id;
           $result->question_type = $type;
           $result->result = $marks;
           $result->date = time();
           $result->question_details = json_encode($question_details);
           $result->save();
           Flash::success('Exam Done');
           $questions = Question::where('status',true)->get();
           return view('teacher_exams.start')
           ->with('questions', $questions);

        }
        Flash::error('Please Select All the answers');

        $questions = Question::where('status',true)->get();
        return view('teacher_exams.start')
        ->with('questions', $questions);

    }

    public function profileIndex(Request $request)
    {
        $id = auth()->user()->id;
        $teacher = User::find($id);
        $teacher->role = DB::table('roles')->where('id', $teacher->role_id)->first()->name;
        $teacher->school = School::where('id', $teacher->school_id)->first()->school_name;

        return view('profile.index')
            ->with('teacher', $teacher);
    }

    public function profileEdit(Request $request)
    {
        $id = auth()->user()->id;
        $teacher = User::find($id);

        return view('profile.edit')
            ->with('teacher', $teacher);
    }

    public function profileUpdate(Request $request)
    {
        $id = auth()->user()->id;
        $teacher = User::find($id);
        $teacher->first_name = $request->first_name;
        $teacher->last_name = $request->last_name;
        $teacher->mobile_number = $request->mobile_number;
        if($request->profile_image != null){
            $image = User::uploadImage($request);
            $teacher->profile_image = $image;
        }
        $teacher->update();
        Flash::success('Profile updated successfully.');
        $teacher->role = DB::table('roles')->where('id', $teacher->role_id)->first()->name;
        $teacher->school = School::where('id', $teacher->school_id)->first()->school_name;
        return view('profile.index')
            ->with('teacher', $teacher);
    }

    public function searchTeacher(Request $request)
    {
        $user = auth()->user();
        //print_r($request->all());die();
        $users = User::search($request);  
        $schools = School::where('id','!=',$user->id)->get();
        return view('users.index')
            ->with('users', $users)->with('schools', $schools);
    }

    public function getTeacherResult(Request $request)
    {
        $user = User::where('id',$request->id)->first();
        $books = DB::table('teacher_book_details')->where('teacher_id', $request->id)->get();
        foreach($books as $book) {
            $book_name = Book::where('id',$book->book_id)->first()->name;
            $book->name = $book_name;
        }
        $key = [];
        $values = [];
        $results = DB::table('results')->select('results.result')->where('teacher_id', $request->id)->limit(5)->get();
        foreach ($results as $result) {
            array_push($key,$result->result);
        }
        $dates = DB::table('results')->select('results.date')->where('teacher_id', $request->id)->limit(5)->get();
        foreach ($dates as $date) {
            array_push($values,date('y-m-d',$date->date));
        }
        for ($i=0; $i<=count($results); $i++) {
            $colours[] = '#' . substr(str_shuffle('ABCDEF0123456789'), 0, 6);
        }
        $chart = new stdClass();;
        $chart->dataset = $key; 
        $chart->labels = $values;
        $chart->colours = $colours;
        $teacher_results = DB::table('results')->where('teacher_id', $request->id)->get();
        return view('results.index')->with('chart', $chart)->with('user', $user)->with('books', $books)->with('teacher_results', $teacher_results);

    }

    public function getResultQuestionsDeatils(Request $request)
    {
        $result = Result::where('id',$request->id)->first();
        $details = json_decode($result->question_details);
        // $result->details = $details;
        // $ques = [];
        // foreach($details as $detail) {
        //     print_r($detail->question);die();
        // }
        // dd($questions);
        return view('results.question_details')->with('details', $details);

    }

    public function changePasswordView()
    {
        return view('profile.password');
    }

    public function changePassword(Request $request)
    {
        $teacher = auth()->user();
        if ($request->current_password != null && $request->new_password != null && $request->confirm_password != null) {
            if ($request->new_password == $request->confirm_password) {
                if(Hash::check($request->current_password,$teacher->password)){
                    $teacher->update([
                        'password'=>Hash::make($request->new_password)
                    ]);
                    Flash::success('Password successfully updated');
                    return view('profile.index')
                    ->with('teacher', $teacher);
                }else{
                    Flash::error('Current password does not matched');
                    return redirect(route('profile.password-show'));
                }
            }
            Flash::error('New password and current passwords are not match');
            return redirect(route('profile.password-show'));

        }

        Flash::error('All fields are mandatory');
        return redirect(route('profile.password-show'));
    }

    public function getBooks(Request $request)
    {
        $books = Book::first();
        return view('books.index')->with('books',$books);
    }
}

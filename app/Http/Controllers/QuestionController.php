<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateQuestionRequest;
use App\Http\Requests\UpdateQuestionRequest;
use App\Repositories\QuestionRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Models\QuestionTypes;
use App\Jobs\SelectQuestionsJobs;
use App\Models\SelectedQuestion;
use App\Models\Question;

class QuestionController extends AppBaseController
{
    /** @var QuestionRepository $questionRepository*/
    private $questionRepository;

    public function __construct(QuestionRepository $questionRepo)
    {
        $this->questionRepository = $questionRepo;
    }

    /**
     * Display a listing of the Question.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $questions = $this->questionRepository->all();

        return view('questions.index')
            ->with('questions', $questions);
    }

    /**
     * Show the form for creating a new Question.
     *
     * @return Response
     */
    public function create()
    {
        $question_types = QuestionTypes::pluck('name', 'id')->prepend('Select a Type', null);
        return view('questions.create')->with('question_types', $question_types);
    }

    /**
     * Store a newly created Question in storage.
     *
     * @param CreateQuestionRequest $request
     *
     * @return Response
     */
    public function store(CreateQuestionRequest $request)
    {
        $input = $request->all();

        $question = $this->questionRepository->create($input);

        Flash::success('Question saved successfully.');

        return redirect(route('questions.index'));
    }

    /**
     * Display the specified Question.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $question = $this->questionRepository->find($id);

        if (empty($question)) {
            Flash::error('Question not found');

            return redirect(route('questions.index'));
        }

        return view('questions.show')->with('question', $question);
    }

    /**
     * Show the form for editing the specified Question.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $question = $this->questionRepository->find($id);
        $question_types = QuestionTypes::pluck('name', 'id')->prepend('Select a Type', null);
        if (empty($question)) {
            Flash::error('Question not found');

            return redirect(route('questions.index'));
        }

        return view('questions.edit')->with('question', $question)->with('question_types',$question_types);
    }

    /**
     * Update the specified Question in storage.
     *
     * @param int $id
     * @param UpdateQuestionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateQuestionRequest $request)
    {
        $question = $this->questionRepository->find($id);

        if (empty($question)) {
            Flash::error('Question not found');

            return redirect(route('questions.index'));
        }

        $question = $this->questionRepository->update($request->all(), $id);

        Flash::success('Question updated successfully.');

        return redirect(route('questions.index'));
    }

    /**
     * Remove the specified Question from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $question = $this->questionRepository->find($id);

        if (empty($question)) {
            Flash::error('Question not found');

            return redirect(route('questions.index'));
        }

        $this->questionRepository->delete($id);

        Flash::success('Question deleted successfully.');

        return redirect(route('questions.index'));
    }

    public function selectQuestions(Request $request)
    {
        if ($request->ids == null) {
            Flash::error('Plese select questions.');

            return redirect(route('questions.index'));
        }
        foreach($request->ids as $id){
            $selectQuestion = (new SelectQuestionsJobs($id));
            dispatch($selectQuestion);
        }
        Flash::success('Question selected successfully.');

        return redirect(route('questions.index'));
    }

    public function selectedQuestions(Request $request)
    {
        $selected_questions = Question::where('status',true)->get();
        return view('selected_Questions.index')
            ->with('selected_questions', $selected_questions);
    }

    public function deleteSelectedQuestions(Request $request)
    {
        foreach($request->ids as $id){
            $question = SelectedQuestion::where('id',$id)->first();
            $question->delete();
        }
        Flash::success('Selected Question selected successfully.');

        return redirect(route('selected_Questions.index'));
    }

    public function remove($id)
    {
        $question = Question::where('id',$id)->first();
        $question->status = false;
        $question->update();
        Flash::success('This question removed successfully.');

        return redirect(route('selected_Questions.index'));
    }

    public function searchQuestion(Request $request)
    {
        $questions = Question::search($request);

        return view('questions.index')
            ->with('questions', $questions);
    }
}

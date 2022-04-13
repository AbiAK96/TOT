<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateQuestionTypesRequest;
use App\Http\Requests\UpdateQuestionTypesRequest;
use App\Repositories\QuestionTypesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class QuestionTypesController extends AppBaseController
{
    /** @var QuestionTypesRepository $questionTypesRepository*/
    private $questionTypesRepository;

    public function __construct(QuestionTypesRepository $questionTypesRepo)
    {
        $this->questionTypesRepository = $questionTypesRepo;
    }

    /**
     * Display a listing of the QuestionTypes.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $questionTypes = $this->questionTypesRepository->all();

        return view('question_types.index')
            ->with('questionTypes', $questionTypes);
    }

    /**
     * Show the form for creating a new QuestionTypes.
     *
     * @return Response
     */
    public function create()
    {
        return view('question_types.create');
    }

    /**
     * Store a newly created QuestionTypes in storage.
     *
     * @param CreateQuestionTypesRequest $request
     *
     * @return Response
     */
    public function store(CreateQuestionTypesRequest $request)
    {
        $input = $request->all();

        $questionTypes = $this->questionTypesRepository->create($input);

        Flash::success('Question Types saved successfully.');

        return redirect(route('questionTypes.index'));
    }

    /**
     * Display the specified QuestionTypes.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $questionTypes = $this->questionTypesRepository->find($id);

        if (empty($questionTypes)) {
            Flash::error('Question Types not found');

            return redirect(route('questionTypes.index'));
        }

        return view('question_types.show')->with('questionTypes', $questionTypes);
    }

    /**
     * Show the form for editing the specified QuestionTypes.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $questionTypes = $this->questionTypesRepository->find($id);

        if (empty($questionTypes)) {
            Flash::error('Question Types not found');

            return redirect(route('questionTypes.index'));
        }

        return view('question_types.edit')->with('questionTypes', $questionTypes);
    }

    /**
     * Update the specified QuestionTypes in storage.
     *
     * @param int $id
     * @param UpdateQuestionTypesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateQuestionTypesRequest $request)
    {
        $questionTypes = $this->questionTypesRepository->find($id);

        if (empty($questionTypes)) {
            Flash::error('Question Types not found');

            return redirect(route('questionTypes.index'));
        }

        $questionTypes = $this->questionTypesRepository->update($request->all(), $id);

        Flash::success('Question Types updated successfully.');

        return redirect(route('questionTypes.index'));
    }

    /**
     * Remove the specified QuestionTypes from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $questionTypes = $this->questionTypesRepository->find($id);

        if (empty($questionTypes)) {
            Flash::error('Question Types not found');

            return redirect(route('questionTypes.index'));
        }

        $this->questionTypesRepository->delete($id);

        Flash::success('Question Types deleted successfully.');

        return redirect(route('questionTypes.index'));
    }
}

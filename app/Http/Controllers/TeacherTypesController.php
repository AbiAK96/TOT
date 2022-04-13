<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTeacherTypesRequest;
use App\Http\Requests\UpdateTeacherTypesRequest;
use App\Repositories\TeacherTypesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class TeacherTypesController extends AppBaseController
{
    /** @var TeacherTypesRepository $teacherTypesRepository*/
    private $teacherTypesRepository;

    public function __construct(TeacherTypesRepository $teacherTypesRepo)
    {
        $this->teacherTypesRepository = $teacherTypesRepo;
    }

    /**
     * Display a listing of the TeacherTypes.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $teacherTypes = $this->teacherTypesRepository->all();

        return view('teacher_types.index')
            ->with('teacherTypes', $teacherTypes);
    }

    /**
     * Show the form for creating a new TeacherTypes.
     *
     * @return Response
     */
    public function create()
    {
        return view('teacher_types.create');
    }

    /**
     * Store a newly created TeacherTypes in storage.
     *
     * @param CreateTeacherTypesRequest $request
     *
     * @return Response
     */
    public function store(CreateTeacherTypesRequest $request)
    {
        $input = $request->all();

        $teacherTypes = $this->teacherTypesRepository->create($input);

        Flash::success('Teacher Types saved successfully.');

        return redirect(route('teacherTypes.index'));
    }

    /**
     * Display the specified TeacherTypes.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $teacherTypes = $this->teacherTypesRepository->find($id);

        if (empty($teacherTypes)) {
            Flash::error('Teacher Types not found');

            return redirect(route('teacherTypes.index'));
        }

        return view('teacher_types.show')->with('teacherTypes', $teacherTypes);
    }

    /**
     * Show the form for editing the specified TeacherTypes.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $teacherTypes = $this->teacherTypesRepository->find($id);

        if (empty($teacherTypes)) {
            Flash::error('Teacher Types not found');

            return redirect(route('teacherTypes.index'));
        }

        return view('teacher_types.edit')->with('teacherTypes', $teacherTypes);
    }

    /**
     * Update the specified TeacherTypes in storage.
     *
     * @param int $id
     * @param UpdateTeacherTypesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTeacherTypesRequest $request)
    {
        $teacherTypes = $this->teacherTypesRepository->find($id);

        if (empty($teacherTypes)) {
            Flash::error('Teacher Types not found');

            return redirect(route('teacherTypes.index'));
        }

        $teacherTypes = $this->teacherTypesRepository->update($request->all(), $id);

        Flash::success('Teacher Types updated successfully.');

        return redirect(route('teacherTypes.index'));
    }

    /**
     * Remove the specified TeacherTypes from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $teacherTypes = $this->teacherTypesRepository->find($id);

        if (empty($teacherTypes)) {
            Flash::error('Teacher Types not found');

            return redirect(route('teacherTypes.index'));
        }

        $this->teacherTypesRepository->delete($id);

        Flash::success('Teacher Types deleted successfully.');

        return redirect(route('teacherTypes.index'));
    }
}

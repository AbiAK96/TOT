<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSchoolRequest;
use App\Http\Requests\UpdateSchoolRequest;
use App\Repositories\SchoolRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Models\School;
use App\Models\User;

class SchoolController extends AppBaseController
{
    /** @var SchoolRepository $schoolRepository*/
    private $schoolRepository;

    public function __construct(SchoolRepository $schoolRepo)
    {
        $this->schoolRepository = $schoolRepo;
    }

    /**
     * Display a listing of the School.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $schools = School::where('id','!=',1)->get();

        return view('schools.index')
            ->with('schools', $schools);
    }

    /**
     * Show the form for creating a new School.
     *
     * @return Response
     */
    public function create()
    {
        return view('schools.create');
    }

    /**
     * Store a newly created School in storage.
     *
     * @param CreateSchoolRequest $request
     *
     * @return Response
     */
    public function store(CreateSchoolRequest $request)
    {
        $input = $request->all();

        $school = $this->schoolRepository->create($input);

        Flash::success('School added successfully.');

        return redirect(route('schools.index'));
    }

    /**
     * Display the specified School.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $school = $this->schoolRepository->find($id);

        if (empty($school)) {
            Flash::error('School not found');

            return redirect(route('schools.index'));
        }
        $users = User::where('school_id',$id)->get();
        return view('schools.show')->with('school', $school)->with('users', $users);
    }

    /**
     * Show the form for editing the specified School.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $school = $this->schoolRepository->find($id);

        if (empty($school)) {
            Flash::error('School not found');

            return redirect(route('schools.index'));
        }

        return view('schools.edit')->with('school', $school);
    }

    /**
     * Update the specified School in storage.
     *
     * @param int $id
     * @param UpdateSchoolRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSchoolRequest $request)
    {
        $school = $this->schoolRepository->find($id);

        if (empty($school)) {
            Flash::error('School not found');

            return redirect(route('schools.index'));
        }

        $school = $this->schoolRepository->update($request->all(), $id);

        Flash::success('School updated successfully.');

        return redirect(route('schools.index'));
    }

    /**
     * Remove the specified School from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $school = $this->schoolRepository->find($id);

        if (empty($school)) {
            Flash::error('School not found');

            return redirect(route('schools.index'));
        }

        $this->schoolRepository->delete($id);

        Flash::success('School deleted successfully.');

        return redirect(route('schools.index'));
    }

    public function searchSchool(Request $request)
    {
        $schools = School::search($request);

        return view('schools.index')
            ->with('schools', $schools);
    }
}

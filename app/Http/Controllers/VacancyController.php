<?php

namespace App\Http\Controllers;

use App\Http\Requests\vacancy\StoreVacancyRequest;
use App\Http\Resources\VacancyResource;
use App\Models\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class VacancyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return AnonymousResourceCollection
     */
    public function index(Request $request): AnonymousResourceCollection
    {
        $vacancies = Vacancy::paginate($request->get('pageSize', 10));
        $vacancies->load('job', 'department', 'branchOffice');

        return VacancyResource::collection($vacancies);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreVacancyRequest $request
     * @return VacancyResource
     */
    public function store(StoreVacancyRequest $request): VacancyResource
    {
        $vacancy = Vacancy::create($request->all());
        $vacancy->load('job', 'department', 'branchOffice');

        return new VacancyResource($vacancy);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

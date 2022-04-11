<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreApplicantRequest;
use App\Http\Resources\ApplicantResource;
use App\Models\Applicant;
use Illuminate\Http\Request;

class ApplicantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return
     */
    public function index(Request $request)
    {
        $applicants = Applicant::paginate($request->get('pageSize', 10));
        $applicants->load('resume');

        return ApplicantResource::collection($applicants);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreApplicantRequest $request
     * @return ApplicantResource
     */
    public function store(StoreApplicantRequest $request): ApplicantResource
    {
        $resume = $request->file('resume');
        $applicant = Applicant::create($request->all());
        $applicant->resume()->create([
            'path' => $resume->store('public'),
            'file_name' => $resume->getClientOriginalName()
        ]);
        $applicant->load('resume');
        return new ApplicantResource($applicant);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Applicant $applicant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Applicant $applicant)
    {
        //
    }
}

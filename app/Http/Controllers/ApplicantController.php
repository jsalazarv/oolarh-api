<?php

namespace App\Http\Controllers;

use App\Http\Requests\applicant\UpdateApplicantRequest;
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
     * @param $id
     * @return ApplicantResource
     */
    public function show($id): ApplicantResource
    {
        $applicant = Applicant::find($id);
        $applicant->load('resume');

        return new ApplicantResource($applicant);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateApplicantRequest $request
     * @param $id
     * @return ApplicantResource
     */
    public function update(UpdateApplicantRequest $request, $id): ApplicantResource
    {
        $resume = $request->file('resume');
        $applicant = Applicant::findOrFail($id);
        $applicant->resume()->update([
            'path' => $resume->store('public'),
            'file_name' => $resume->getClientOriginalName()
        ]);
        $applicant->load('resume');
        $applicant->update($request->all());

        return new ApplicantResource($applicant);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return void
     */
    public function destroy($id): void
    {
        $applicant = Applicant::findOrFail($id);
        $applicant->load('resume');
        $applicant->resume()->delete();
        Applicant::destroy($id);
    }
}

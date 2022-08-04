<?php

namespace App\Http\Controllers;

use App\Http\Requests\job\StoreJobRequest;
use App\Http\Requests\job\UpdateJobRequest;
use App\Http\Resources\JobResource;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return AnonymousResourceCollection
     */
    public function index(Request $request): AnonymousResourceCollection
    {
        $jobs = Job::paginate($request->get("'pageSize', 10"));

        return JobResource::collection($jobs);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreJobRequest $request
     * @return JobResource
     */
    public function store(StoreJobRequest $request): JobResource
    {
        $jobs = Job::create($request->all());

        return new JobResource($jobs);

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return JobResource
     */
    public function show(int $id): JobResource
    {
        $jobs = Job::find($id);

        return new JobResource($jobs);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateJobRequest $request
     * @param int $id
     * @return JobResource
     */
    public function update(UpdateJobRequest $request, int $id): JobResource
    {
        $jobs = Job::findOrFail($id);
        $jobs->update($request->all());

        return new JobResource($jobs);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return void
     */
    public function destroy($id): void
    {
        Job::destroy($id);
    }
}

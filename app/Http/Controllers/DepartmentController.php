<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDepartmentRequest;
use App\Http\Resources\DepartmentResource;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return AnonymousResourceCollection|Response
     */
    public function index(Request $request): AnonymousResourceCollection | Response
    {
        $departments = Department::paginate($request->get('pageSize', 10));

        if($request->headers->get('Accept') == 'application/xml') {
            $config = [
                'template' => '<root></root>',
                'rowName' => 'item'
            ];

            return response()->xml($departments, 200, $config);
        }

        return DepartmentResource::collection($departments);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreDepartmentRequest $request
     * @return DepartmentResource
     */
    public function store(StoreDepartmentRequest $request): DepartmentResource
    {
        $department = new Department();
        $department->name = $request->get('name');
        $department->save();

        return new DepartmentResource($department);
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return DepartmentResource
     */
    public function show($id): DepartmentResource
    {
        $department = Department::find($id);

        return new DepartmentResource($department);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $id
     * @return DepartmentResource
     */
    public function update(Request $request, $id): DepartmentResource
    {
        $department = Department::findOrFail($id);
        $department->name = $request->get('name');

        $department->save();

        return new DepartmentResource($department);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return void
     */
    public function destroy($id): void
    {
        Department::destroy($id);
    }
}

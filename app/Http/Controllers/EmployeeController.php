<?php

namespace App\Http\Controllers;

use App\Http\Requests\employee\StoreEmployeeRequest;
use App\Http\Resources\EmployeeResource;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return
     */
    public function index(Request $request)
    {
        $employees = Employee::paginate($request->get('pageSize', 10));
        $employees->load(
            'resume',
            'vacancy.branchOffice',
            'vacancy.department',
            'vacancy.job'
        );

        return EmployeeResource::collection($employees);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreEmployeeRequest $request
     * @return EmployeeResource
     */
    public function store(StoreEmployeeRequest $request): EmployeeResource
    {
        $resume = $request->file('resume');
        $employee = Employee::create($request->all());
        $employee->resume()->create([
            'path' => $resume->store('public'),
            'file_name' => $resume->getClientOriginalName()
        ]);

        $employee->load(
            'resume',
            'vacancy.branchOffice',
            'vacancy.department',
            'vacancy.job'
        );

        return new EmployeeResource($employee);
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
     * @param $id
     * @return void
     */
    public function destroy($id): void
    {
        Employee::findOrFail($id);
        //TODO: load relationships
        Employee::destroy($id);
    }
}

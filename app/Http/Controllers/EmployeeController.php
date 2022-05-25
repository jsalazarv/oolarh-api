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
            'address',
            'contact',
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
        $employee->contact()->create([
            'email' => $request->email,
            'phone' => $request->phone,
            'cellphone' => $request->cellphone
        ]);
        $employee->address()->create([
            'country' => $request->country,
            'state' => $request->state,
            'municipality' => $request->municipality,
            'suburb' => $request->suburb,
            'street' => $request->street,
            'outdoor_number' => $request->outdoor_number,
            'interior_number' => $request->interior_number,
            'postal_code' => $request->postal_code
        ]);
        $employee->profile_status = "complete";
        $employee->employee_status = "active";

        $employee->save();

        $employee->resume()->create([
            'path' => $resume->store('public'),
            'file_name' => $resume->getClientOriginalName()
        ]);

        $employee->load(
            'resume',
            'address',
            'contact',
            'vacancy.branchOffice',
            'vacancy.department',
            'vacancy.job'
        );

        return new EmployeeResource($employee);
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return EmployeeResource
     */
    public function show($id): EmployeeResource
    {
        $employee = Employee::with(
            'resume',
            'vacancy.branchOffice',
            'vacancy.department',
            'vacancy.job'
        )->findOrFail($id);

        return new EmployeeResource($employee);
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

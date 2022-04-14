<?php

namespace App\Http\Controllers;

use App\Http\Resources\BranchOfficeResource;
use App\Models\BranchOffice;
use App\Http\Requests\branchOffice\StoreBranchOfficeRequest;
use Illuminate\Http\Request;

class BranchOfficeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return
     */
    public function index(Request $request)
    {
        $branchOffice = BranchOffice::paginate($request->get('pageSize', 10));

        $branchOffice->load('address', 'contact');

        return BranchOfficeResource::collection($branchOffice);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBranchOfficeRequest $request)
    {
        $branchOffice = BranchOffice::create($request->all());
        $branchOffice->contact()->create([
            'email' => $request->email,
            'phone' => $request->phone,
            'cellphone' => $request->cellphone
        ]);
        $branchOffice->address()->create([
            'country' => $request->country,
             'state' => $request->state,
             'municipality' => $request->municipality,
             'suburb' => $request->suburb,
             'street' => $request->street,
             'outdoor_number' => $request->outdoor_number,
             'interior_number' => $request->interior_number,
             'postal_code' => $request->postal_code
        ]);
        $branchOffice->load('address', 'contact');

        return new BranchOfficeResource($branchOffice);
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

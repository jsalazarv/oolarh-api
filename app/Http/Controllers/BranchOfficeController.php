<?php

namespace App\Http\Controllers;

use App\Http\Resources\BranchOfficeResource;
use App\Models\BranchOffice;
use App\Http\Requests\branchOffice\StoreBranchOfficeRequest;
use App\Http\Requests\branchOffice\UpdateBranchOfficeRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class BranchOfficeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return AnonymousResourceCollection
     */
    public function index(Request $request): AnonymousResourceCollection
    {
        $branchOffice = BranchOffice::paginate($request->get('pageSize', 10));

        $branchOffice->load('address', 'contact');

        return BranchOfficeResource::collection($branchOffice);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreBranchOfficeRequest $request
     * @return BranchOfficeResource
     */
    public function store(StoreBranchOfficeRequest $request): BranchOfficeResource
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
     * @param $id
     * @return BranchOfficeResource
     */
    public function show($id): BranchOfficeResource
    {
        $branchOffice = BranchOffice::find($id);
        $branchOffice->load('address','contact');

        return new BranchOfficeResource($branchOffice);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateBranchOfficeRequest $request
     * @param $id
     * @return BranchOfficeResource
     */
    public function update(UpdateBranchOfficeRequest $request, $id): BranchOfficeResource
    {
       $branchOffice = BranchOffice::findOrFail($id);
       $branchOffice->contact()->update([
        'email' => $request->email,
        'phone' => $request->phone,
        'cellphone' => $request->cellphone
        ]);

        $branchOffice->address()->update([
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
        $branchOffice->update($request->all());

        return new BranchOfficeResource($branchOffice);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return void
     */
    public function destroy($id): void
    {
        $branchOffice = BranchOffice::findOrFail($id);
        $branchOffice->load('address', 'contact');
        $branchOffice->contact()->delete();
        $branchOffice->address()->delete();
        BranchOffice::destroy($id);
    }
}

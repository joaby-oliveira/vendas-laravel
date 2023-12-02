<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSalesmanRequest;
use App\Http\Requests\UpdateSalesmanRequest;
use App\Http\Resources\SalesmanResource;
use App\Models\Salesman;

class SalesmanController extends Controller
{
    public function index()
    {
        $salesmen = Salesman::all();

        return SalesmanResource::collection($salesmen);
    }

    public function store(StoreSalesmanRequest $request)
    {
        $data = $request->validated();
        $data['password'] = bcrypt($request->password);

        $salesman = Salesman::create($data);

        return new SalesmanResource($salesman);
    }

    /**
     * Display the specified resource.
     */
    public function show(Salesman $salesman)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Salesman $salesman)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSalesmanRequest $request, Salesman $salesman)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Salesman $salesman)
    {
        //
    }
}

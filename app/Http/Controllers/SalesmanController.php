<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSalesmanRequest;
use App\Http\Requests\UpdateSalesmanRequest;
use App\Http\Resources\SalesmanResource;
use App\Models\Salesman;
use Throwable;

class SalesmanController extends Controller
{
    public function index()
    {
        try {
            $salesmen = Salesman::all();

            return SalesmanResource::collection($salesmen);
        } catch (Throwable $error) {
            return response()->json([
                "message" => "Não foi possível obter a lista de vendedores"
            ], 500);
        }
    }

    public function store(StoreSalesmanRequest $request)
    {
        try {
            $data = $request->validated();
            $data['password'] = bcrypt($request->password);

            $salesman = Salesman::create($data);

            return new SalesmanResource($salesman);
        } catch (Throwable $error) {
            return response()->json([
                "message" => "Não foi possível criar o vendedor"
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $salesman = Salesman::findOrFail($id);

            return new SalesmanResource($salesman);
        } catch (Throwable $error) {
            dd($error);
            return response()->json([
                "message" => "Nenhum vendedor encontrado"
            ], 404);
        }
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

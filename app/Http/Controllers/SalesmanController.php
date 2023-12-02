<?php

namespace App\Http\Controllers;

use App\Http\Requests\Salesman\StoreSalesmanRequest;
use App\Http\Requests\Salesman\UpdateSalesmanRequest;
use App\Http\Resources\SalesmanResource;
use App\Models\Salesman;
use Illuminate\Http\Response;
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
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
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

    public function show(string $id)
    {
        try {
            $salesman = Salesman::findOrFail($id);

            return new SalesmanResource($salesman);
        } catch (Throwable $error) {
            dd($error);
            return response()->json([
                "message" => "Nenhum vendedor encontrado"
            ], Response::HTTP_NOT_FOUND);
        }
    }

    public function update(UpdateSalesmanRequest $request, string $id)
    {
        try {
            $data = $request->validated();
            $salesman = Salesman::findOrFail($id);
            $salesman->update($data);

            return new SalesmanResource($salesman);
        } catch (Throwable $error) {
            return response()->json([
                "message" => "Nenhum vendedor encontrado"
            ], Response::HTTP_NOT_FOUND);
        }
    }

    public function destroy(string $id)
    {
        try {
            $salesman = Salesman::findOrFail($id);

            $salesman->delete();

            return response()->json([], Response::HTTP_NO_CONTENT);
        } catch (Throwable $error) {
            return response()->json([
                "message" => "Informe um vendedor existente"
            ], Response::HTTP_NOT_FOUND);
        }
    }
}

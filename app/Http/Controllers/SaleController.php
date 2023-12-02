<?php

namespace App\Http\Controllers;

use App\Http\Requests\Sale\StoreSaleRequest;
use App\Http\Requests\Sale\UpdateSaleRequest;
use App\Http\Resources\SaleResource;
use App\Models\Sale;
use Throwable;

class SaleController extends Controller
{
    public function index()
    {
        try {
            $sales = Sale::paginate();
            return new SaleResource($sales);
        } catch (Throwable $error) {
            response()->json([
                "message" => "Não foi possível obter a lista de vendas"
            ]);
        }
    }


    public function store(StoreSaleRequest $request)
    {
        try {
            $data = $request->validated();

            return new SaleResource($data);
        } catch (Throwable $error) {
            response()->json([
                "message" => "Não foi possível registrar a venda"
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Sale $sale)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sale $sale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSaleRequest $request, Sale $sale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sale $sale)
    {
        //
    }
}

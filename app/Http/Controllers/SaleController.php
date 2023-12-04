<?php

namespace App\Http\Controllers;

use App\Http\Requests\Sale\StoreSaleRequest;
use App\Http\Requests\Sale\UpdateSaleRequest;
use App\Http\Resources\SaleResource;
use App\Models\Sale;
use App\Models\Salesman;
use App\Services\Sale\DestroySaleService;
use App\Services\Sale\ListSaleService;
use App\Services\Sale\ShowSaleService;
use App\Services\Sale\StoreSaleService;
use App\Services\Sale\UpdateSaleService;
use Exception;
use Illuminate\Http\Response;

use Throwable;
use App\Utils\ResponseHelper;

class SaleController extends Controller
{
    public function index()
    {
        return ListSaleService::execute();
    }


    public function store(StoreSaleRequest $request)
    {

        $data = $request->validated();
        return StoreSaleService::execute($data);
    }

    public function show(string $id)
    {
        return ShowSaleService::execute($id);
    }

    public function update(UpdateSaleRequest $request, string $id)
    {
        $data = $request->validated();
        return UpdateSaleService::execute($data, $id);
    }

    public function destroy(string $id)
    {
        $sale = Sale::find($id);
        return DestroySaleService::execute($sale);
    }
}

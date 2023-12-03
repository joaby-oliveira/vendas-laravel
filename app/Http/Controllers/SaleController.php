<?php

namespace App\Http\Controllers;

use App\Http\Requests\Sale\StoreSaleRequest;
use App\Http\Requests\Sale\UpdateSaleRequest;
use App\Http\Resources\SaleResource;
use App\Models\Sale;
use App\Models\Salesman;
use App\Services\Salesman\DestroySaleService;
use App\Services\Salesman\ListSaleService;
use App\Services\Salesman\ShowSaleService;
use App\Services\Salesman\StoreSaleService;
use App\Services\Salesman\UpdateSaleService;
use Exception;
use Illuminate\Http\Response;

use Throwable;
use App\Utils\ResponseHelper;

class SaleController extends Controller
{
    public function index()
    {
        ListSaleService::execute();
    }


    public function store(StoreSaleRequest $request)
    {
        $data = $request->validated();
        StoreSaleService::execute($data);
    }

    public function show(string $id)
    {
        ShowSaleService::execute($id);
    }

    public function update(UpdateSaleRequest $request, string $id)
    {
        $data = $request->validated();
        UpdateSaleService::execute($data, $id);
    }

    public function destroy(string $id)
    {
        $sale = Sale::find($id);
        DestroySaleService::execute($sale);
    }
}

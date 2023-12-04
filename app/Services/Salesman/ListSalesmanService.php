<?php

namespace App\Services\Salesman;

use App\Http\Resources\SaleResource;
use App\Http\Resources\SalesmanResource;
use App\Models\Sale;
use App\Models\Salesman;
use App\Utils\ResponseHelper;
use Throwable;

class ListSalesmanService
{
    public static function execute()
    {
        try {
            $salesmen = Salesman::all();
            return SalesmanResource::collection($salesmen);
        } catch (Throwable $error) {
            return ResponseHelper::errorResponse("Não foi possível obter a lista de vendedores");
        }
    }
}

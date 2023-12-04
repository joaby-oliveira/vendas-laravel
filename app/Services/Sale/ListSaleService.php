<?php

namespace App\Services\Sale;

use App\Http\Resources\SaleResource;
use App\Models\Sale;
use App\Utils\ResponseHelper;
use Throwable;

class ListSaleService
{
    public static function execute()
    {
        try {
            $sales = Sale::with('salesman:id,name,email,commission')->get();
            return SaleResource::collection($sales);
        } catch (Throwable $error) {
            dd($error);
            return ResponseHelper::errorResponse(
                'Não foi possível obter a lista de vendas, tente novamente mais tarde'
            );
        }
    }
}

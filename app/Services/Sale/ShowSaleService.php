<?php

namespace App\Services\Salesman;

use App\Http\Resources\SaleResource;
use App\Models\Sale;
use App\Utils\ResponseHelper;
use Exception;
use Illuminate\Http\Response;
use Throwable;

class ShowSaleService
{
    public static function execute(string $id)
    {
        try {
            $sale = Sale::find($id);
            if (!$sale) {
                throw new Exception('Venda não encontrada');
            }
            return new SaleResource($sale);
        } catch (Throwable $error) {
            if ($error->getMessage() == 'Venda não encontrada') {
                return ResponseHelper::errorResponse("Venda não encontrada", Response::HTTP_NOT_FOUND);
            }
            return ResponseHelper::errorResponse("Não foi possível buscar venda, tente novamente mais tarde");
        }
    }
}

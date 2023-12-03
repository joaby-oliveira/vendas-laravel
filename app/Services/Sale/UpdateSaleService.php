<?php

namespace App\Services\Sale;

use App\Http\Resources\SaleResource;
use App\Models\Sale;
use App\Utils\ResponseHelper;
use Exception;
use Illuminate\Http\Response;
use Throwable;

class UpdateSaleService
{
    public static function  execute($data, $id)
    {
        try {
            $sale = Sale::find($id);
            if (!$sale) {
                throw new Exception('Venda não encontrada');
            }
            $sale->update($data);

            return new SaleResource($sale);
        } catch (Throwable $error) {
            if ($error->getMessage() == 'Venda não encontrada') {
                return ResponseHelper::errorResponse("Venda não encontrada", Response::HTTP_NOT_FOUND);
            }
            return ResponseHelper::errorResponse("Não foi possível buscar venda, tente novamente mais tarde");
        }
    }
}

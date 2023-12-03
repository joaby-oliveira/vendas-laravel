<?php

namespace App\Services\Sale;

use App\Models\Sale;
use App\Utils\ResponseHelper;
use Exception;
use Illuminate\Http\Response;
use Throwable;

class DestroySaleService
{
    public static function execute(Sale $sale)
    {
        try {
            if (!$sale) {
                throw new Exception('Venda não encontrada');
            }
            $sale->delete();
            return ResponseHelper::deletedResponse();
        } catch (Throwable $error) {
            if ($error->getMessage() == 'Venda não encontrada') {
                return ResponseHelper::errorResponse("Venda não encontrada", Response::HTTP_NOT_FOUND);
            }
            return ResponseHelper::errorResponse("Não foi possível buscar venda, tente novamente mais tarde");
        }
    }
}

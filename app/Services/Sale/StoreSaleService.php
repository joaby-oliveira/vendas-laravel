<?php

namespace App\Services\Salesman;

use App\Http\Resources\SaleResource;
use App\Models\Sale;
use App\Models\Salesman;
use App\Utils\ResponseHelper;
use Exception;
use Illuminate\Http\Response;
use Throwable;

class StoreSaleService
{
    public static function execute($data)
    {
        try {
            $salesman = Salesman::find($data["salesman_id"]);

            if (!$salesman) {
                throw new Exception('Usuário inexistente');
            }

            $sales = $salesman->sale()->create($data);

            return new SaleResource($sales);
        } catch (Throwable $error) {
            if ($error->getMessage() == 'Usuário inexistente') {
                return ResponseHelper::errorResponse(
                    $error->getMessage(),
                    Response::HTTP_NOT_FOUND
                );
            }
            return ResponseHelper::errorResponse(
                'Não foi possível registrar a venda, tente novamente mais tarde'
            );
        }
    }
}

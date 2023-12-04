<?php

namespace App\Services\Salesman;

use App\Http\Resources\SaleResource;
use App\Http\Resources\SalesmanResource;
use App\Models\Sale;
use App\Models\Salesman;
use App\Utils\ResponseHelper;
use Illuminate\Http\Response;
use Throwable;

class UpdateSalesmanService
{
    public static function execute($data, string $id)
    {
        try {
            $salesman = Salesman::findOrFail($id);
            $salesman->update($data);

            return new SalesmanResource($salesman);
        } catch (Throwable $error) {
            return ResponseHelper::errorResponse("Nenhum vendedor encontrado", Response::HTTP_NOT_FOUND);
        }
    }
}

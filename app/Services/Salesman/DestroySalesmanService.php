<?php

namespace App\Services\Salesman;

use App\Http\Resources\SaleResource;
use App\Models\Sale;
use App\Models\Salesman;
use App\Utils\ResponseHelper;
use Illuminate\Http\Response;
use Throwable;

class DestroySalesmanService
{
    public static function execute(string $id)
    {
        try {
            $salesman = Salesman::findOrFail($id);
            $salesman->delete();

            return response()->json([], Response::HTTP_NO_CONTENT);
        } catch (Throwable $error) {
            return ResponseHelper::errorResponse("Informe um vendedor existente", Response::HTTP_NOT_FOUND);
        }
    }
}

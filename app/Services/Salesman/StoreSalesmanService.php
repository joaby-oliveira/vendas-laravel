<?php

namespace App\Services\Salesman;

use App\Http\Resources\SalesmanResource;
use App\Models\Salesman;
use App\Utils\ResponseHelper;
use Throwable;

class StoreSalesmanService
{
    public static function execute($data)
    {
        try {
            $salesman = Salesman::create($data);
            return new SalesmanResource($salesman);
        } catch (Throwable $error) {
            return ResponseHelper::errorResponse("Não foi possível criar o vendedor");
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\Sale\StoreSaleRequest;
use App\Http\Requests\Sale\UpdateSaleRequest;
use App\Http\Resources\SaleResource;
use App\Models\Sale;
use App\Models\Salesman;
use Exception;
use Illuminate\Http\Response;

use Throwable;
use App\Utils\ResponseHelper;

class SaleController extends Controller
{
    public function index()
    {
        try {
            $sales = Sale::all();
            return new SaleResource($sales);
        } catch (Throwable $error) {
            return ResponseHelper::errorResponse(
                'Não foi possível obter a lista de vendas, tente novamente mais tarde'
            );
        }
    }


    public function store(StoreSaleRequest $request)
    {
        try {
            $data = $request->validated();

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

    public function show(string $id)
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

    public function update(UpdateSaleRequest $request, string $id)
    {
        try {
            $data = $request->validated();
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

    public function destroy(string $id)
    {
        try {
            $sale = Sale::find($id);
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

<?php

namespace App\Http\Controllers;

use App\Http\Requests\Salesman\StoreSalesmanRequest;
use App\Http\Requests\Salesman\UpdateSalesmanRequest;
use App\Services\Salesman\DestroySalesmanService;
use App\Services\Salesman\ListSalesmanService;
use App\Services\Salesman\ShowSalesmanService;
use App\Services\Salesman\StoreSalesmanService;
use App\Services\Salesman\UpdateSalesmanService;

class SalesmanController extends Controller
{
    public function index()
    {
        return ListSalesmanService::execute();
    }

    public function store(StoreSalesmanRequest $request)
    {
        $data = $request->validated();
        $data['password'] = bcrypt($request->password);
        return StoreSalesmanService::execute($data);
    }

    public function show(string $id)
    {
        return ShowSalesmanService::execute($id);
    }

    public function update(UpdateSalesmanRequest $request, string $id)
    {
        $data = $request->validated();
        return UpdateSalesmanService::execute($data, $id);
    }

    public function destroy(string $id)
    {
        return DestroySalesmanService::execute($id);
    }
}

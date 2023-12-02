<?php

use App\Http\Controllers\SalesmanController;
use Illuminate\Support\Facades\Route;

Route::apiResource('/vendedor', SalesmanController::class);

<?php

use App\Http\Controllers\ProductApiController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'v1'], function () {
    Route::get("prices", [ProductApiController::class, "index"]);
});


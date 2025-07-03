<?php

namespace App\Http\Controllers;

use App\Http\Requests\PriceRequest;
use App\Http\Resources\ProductListCollection;
use App\Services\PriceService;
use Illuminate\Http\JsonResponse;

class ProductApiController extends Controller
{


    /**
     * @param PriceRequest $request
     * @param PriceService $service
     * @return JsonResponse
     */
    public function index(PriceRequest $request, PriceService $service)
    {
        $products = $service->getAll($request->validated());

        return response()->json([
            'status' => 'success',
            'data' => new ProductListCollection($products)
        ], 200);
    }
}

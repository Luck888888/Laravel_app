<?php

namespace App\Services;

use App\Currency;
use App\Models\Product;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class PriceService
{
    /**
     * @return LengthAwarePaginator
     */
    public function getAll($data): LengthAwarePaginator
    {
        $currency = Currency::fromString($data['currency'] ?? 'RUB');
        $perPage = config('paginate.product_per_page', 10);

        $query = Product::query()->select('id', 'title', 'price')
                                 ->paginate($perPage);

        $query->getCollection()->transform(function ($product) use ($currency) {
            $product->formatted_price = $this->formatPrice($product->price, $currency);
            return $product;
        });

        return $query;

    }

    /**
     * @param float $price
     * @param Currency $currency
     * @return string
     */
    public function formatPrice(float $price, Currency $currency): string
    {
        $converted = $price * $currency->rate();
        $symbol = $currency->symbol();

        return match ($currency) {
            Currency::USD, Currency::EUR => $symbol . number_format($converted, 2),
            Currency::RUB => number_format($converted, 0, '', ' ') . ' ' . $symbol,
        };
    }

}

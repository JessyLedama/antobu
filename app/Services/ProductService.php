<?php 

namespace App\Services;

use App\Models\Product;
use App\Models\DigitalAsset;
use App\Services\SlugService;
use App\Services\StatusService;

class ProductService
{
    // get products
    public static function products()
    {
        $products = Product::all();

        return $products;
    }

    // store product
    public static function store($productDetails)
    {
        $slugData = $productDetails['name'];

        $productDetails['slug'] = SlugService::make($slugData);

        $productDetails['status_id'] = StatusService::draft();

        $product = Product::create($productDetails);

        return $product;
    }
}
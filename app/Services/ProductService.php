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
        $products = Product::with(['user'])->get();

        return $products;
    }

    // store product
    public static function store($validated)
    {
        $slugData = $validated['name'];

        $slug = SlugService::make($slugData);

        $image = $validated['image']->store('digitalAssetImages', ['disk' => 'public']);

        $digitalAsset = $validated['digital_asset']->store('digitalAssets', ['disk' => 'public']);

        $status = StatusService::inactive();

        $productDetails = [
            'name' => $validated['name'],
            'slug' => $slug,
            'price' => $validated['price'],
            'image' => $image,
            'digital_asset' => $digitalAsset,
            'user_id' => $validated['user_id'],
            'status_id' => $status->id,

        ];

        $product = Product::create($productDetails);

        return $product;
    }
}
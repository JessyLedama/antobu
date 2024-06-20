<?php 

namespace App\Services;

use App\Models\Product;
use App\Services\SlugService;
use App\Services\StatusService;
use App\Models\ProductCategory;

class ProductService
{
    // get products
    public static function products()
    {
        $products = Product::with(['user', 'category'])->paginate(5);

        return $products;
    }

    // store product
    public static function store($validated)
    {
        $slugData = $validated['name'];

        $slug = SlugService::make($slugData);

        $image = $validated['image']->store('productImages', ['disk' => 'public']);

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
            'product_category_id' => $validated['product_category_id'],
        ];

        $product = Product::create($productDetails);

        return $product;
    }

    // search product by slug
    public static function searchBySlug($slug)
    {
        $product = Product::where('slug', $slug)->first();

        return $product;
    }

    // search product by id
    public static function searchById($id)
    {
        $product = Product::where('id', $id)->first();

        return $product;
    }

    // search for a category. 
    // this method is to be used with search input
    public static function search($validated)
    {
        $search = $validated['name'];

        $category = Product::where('name', 'LIKE', "%$search%")
                                    ->with(['category'])
                                    ->first();

        return $category;
    }
}
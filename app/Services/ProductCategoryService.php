<?php

namespace App\Services;

use App\Models\ProductCategory;
use App\Services\SlugService;

class ProductCategoryService
{
    // get product categories
    public static function categories()
    {
        $categories = ProductCategory::with(['products'])->get();

        return $categories;
    }

    // get a specific category
    public static function category($id)
    {
        $category = ProductCategory::where('id', $id)->first();

        return $category;
    }

    // store a new category
    public static function store($validated)
    {
        $slug = SlugService::make($validated['name']);

        $categoryData = [
            'name' => $validated['name'],
            'slug' => $slug,
        ];

        $category = ProductCategory::create($categoryData);

        return $category;
    }   

    // search for a category. 
    // this method is to be used with search input
    public static function search($validated)
    {
        $search = $validated['name'];

        $category = ProductCategory::where('name', 'LIKE', "%$search%")
                                    ->with(['products'])
                                    ->first();

        return $category;
    }
}
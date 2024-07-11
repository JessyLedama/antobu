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

        if(isset($validated['digital_asset']))
        {
            $digitalAsset = $validated['digital_asset']->store('digitalAssets', ['disk' => 'public']);

            $validated['digital_asset'] = $digitalAsset;
        }
        

        $status = StatusService::inactive();

        $productDetails = [
            'name' => $validated['name'],
            'slug' => $slug,
            'price' => $validated['price'],
            'image' => $image,
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
        $product = Product::where('slug', $slug)->with(['category'])->first();

        return $product;
    }

    // search product by id
    public static function searchById($id)
    {
        $product = Product::where('id', $id)->first();

        return $product;
    }

    // search product by id
    public static function find($id)
    {
        $product = Product::where('id', $id)->first();

        return $product;
    }

    /**
     *  Search for products.
     *  This method is used by search input. 
     *  Returns a collection of products.
     */
    public static function search($validated)
    {
        $search = $validated['name'];

        $products = Product::where('name', 'LIKE', "%$search%")
                                    ->with(['category'])
                                    ->get();

        return $products;
    }

    /**
     *  Get similar products to the one being viewed by user.
     */
    public static function similar($product)
    {   
        $category = $product->product_category_id;

        if(isset($category))
        {
            $products = Product::where('product_category_id', $category->id)->random(5)->get();

            return $products;
        }

        else{
            return null;
        }
    }

    /**
     *  update an existing product
     *  return the updated product
     */
    public static function update($validated, $slug)
    {
        $product = self::searchBySlug($slug);

        if(isset($validated['image']))
        {
            $image = $validated['image']->store('productImages', ['disk' => 'public']);
            $validated['image'] = $image;
        }

        if(isset($validated['digital_asset']))
        {
            $image = $validated['image']->store('digitalAssets', ['disk' => 'public']);
            $validated['digital_asset'] = $image;
        }

        $product->update($validated);

        return $product;
    }

    /**
     *  update more_images 
     */

    public static function updateMoreImages($validated, $id)
    {
        $product = self::find($id);

        $imagePaths = [];

        foreach($validated['more_images'] as $image)
        {
            $imagePath = $image->store('more_images', ['disk' => 'public']);

            array_push($imagePaths, $imagePath);
        }

        $product->more_images = implode(",", $imagePaths);

        $product->save();

        return $product;
    }

    /**
     *  update description
     */
    public static function updateDescription($validated, $id)
    {
        $product = self::find($id);

        $product->description = $validated['description'];

        $product = $product->save();

        return $product;
    }

    /**
     *  update description
     */
    public static function updateColor($validated, $id)
    {
        $product = self::find($id);

        $product->color = $validated['color'];

        $product = $product->save();

        return $product;
    }

    /**
     *  update description
     */
    public static function updateMaterial($validated, $id)
    {
        $product = self::find($id);

        $product->material = $validated['material'];

        $product = $product->save();

        return $product;
    }
}
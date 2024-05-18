<?php

namespace App\Http\Controllers;

use App\Services\ProductService;
use Illuminate\Http\Request;
use Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:products'],
            'price' => ['required', 'string', 'max:12'],
            'image' => ['image', 'mimes:jpg,png,jpeg,gif'],
            'digital_asset' => ['file:zip', 'mimes:zip', ],
        ]);

        $productDetails [
            'name' => $validated['name'],
            'price' => $validated['price'],
            'image' => $validated['image'],
            'digital_asset' => $validated['digital_asset'],
        ];

        if(Auth::check())
        {
            $productDetails['user_id'] = Auth::id();
        }

        $product = ProductService::store($productDetails);

        session()->alert('success', 'Your product has been stored.');

        return redirect()->route('admin.product.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}

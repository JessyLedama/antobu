<?php

namespace App\Http\Controllers;

use App\Services\ProductService;
use Illuminate\Http\Request;
use Auth;
use App\Services\ProductCategoryService;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProductsExport;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = ProductService::products();

        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = ProductCategoryService::categories();

        return view('admin.product.create', compact('categories'));
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
            'product_category_id' => ['required', 'int'],
        ]);

        if(Auth::check())
        {
            $validated['user_id'] = Auth::id();
        }

        $product = ProductService::store($validated);

        session()->flash('success', 'Your product has been stored.');

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

    /**
     * Export products in xlsx
     */
    public function xlsx()
    {
        $file = Excel::download(new ProductsExport, 'products.xlsx');

        return $file;
    }

    /**
     * Export products in csv
     */
    public function csv(Request $request)
    {
        $file = Excel::download(new ProductsExport, 'products.csv');

        return $file;
    }
}

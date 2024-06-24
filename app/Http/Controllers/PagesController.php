<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ProductService;
use App\Services\SlideshowService;

class PagesController extends Controller
{
    // get home page
    public function home()
    {
        $slides = SlideshowService::slides();
        $products = ProductService::products();

        return view('welcome', compact('products', 'slides'));
    }

    /**
     *  show selected product
     *  get similar products. (Same category)
     */
    public function showProduct($slug)
    {
        $product = ProductService::searchBySlug($slug);

        $category = $product->category_id;

        $similarProducts = ProductService::similar($product);

        return view('product', compact('product', 'similarProducts'));
    }
}
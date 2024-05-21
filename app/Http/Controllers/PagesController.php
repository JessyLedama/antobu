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
}
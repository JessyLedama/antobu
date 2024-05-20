<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ProductService;

class PagesController extends Controller
{
    // get home page
    public function home()
    {
        $products = ProductService::products();

        return view('welcome', compact('products'));
    }
}
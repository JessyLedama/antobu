<?php

namespace App\Http\Controllers;

use App\Services\OrderService;
use Illuminate\Http\Request;
use App\Services\UserService;
use App\Services\ProductService;
use App\Services\TaxService;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = OrderService::orders();

        return view('admin.order.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customers = UserService::users();

        $products = ProductService::products();

        $taxes = TaxService::taxes();

        $orderProducts = [];

        return view('admin.order.create', compact('customers', 'products', 'orderProducts', 'taxes'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Oder $oder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Oder $oder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Oder $oder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Oder $oder)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Tax;
use Illuminate\Http\Request;

class TaxController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $taxes = TaxService::taxes();

        return view('admin.tax.index' compact('taxes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tax.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['string', 'max:30', 'unique:taxes' 'required'],
            'amount' => ['string', 'required'],
        ]);

        $tax = TaxService::store($validated);

        return redirect()->route('admin.tax.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tax $tax)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tax $tax)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tax $tax)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tax $tax)
    {
        //
    }
}

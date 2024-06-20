<?php

namespace App\Http\Controllers;

use App\Models\CompanyDetail;
use Illuminate\Http\Request;
use App\Services\CompanyService;

class CompanyDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = CompanyService::companies();

        return view('admin.company.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $countries = json_decode(file_get_contents(public_path('countries/countries.json')), true);

        return view('admin.company.create', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:company_details'],
            'address' => ['string'],
            'website' => ['url', 'unique:company_details'],
            'phone' => ['string', 'unique:company_details'],
            'email' => ['email', 'unique:company_details'],
            'tax_id' => ['unique:company_details'],
            'logo' => ['image', 'mimes:jpeg,png,jpg,gif,svg'],
            'country' => ['string'],
        ]);

        $company = CompanyService::store($validated);

        session()->flash('success', 'Your company has been stored.');

        return redirect()->route('admin.company.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(CompanyDetail $companyDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CompanyDetail $companyDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CompanyDetail $companyDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CompanyDetail $companyDetail)
    {
        //
    }
}

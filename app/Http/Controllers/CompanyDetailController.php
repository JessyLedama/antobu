<?php

namespace App\Http\Controllers;

use App\Models\CompanyDetail;
use Illuminate\Http\Request;
use App\Services\CompanyService;
use App\Services\InternationalizationService;

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
        $countries = InternationalizationService::countries();

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

        /**
         *  currently do not support multi companies, so system checks if a
         *  company exists. If a company exists, process fails and 
         *  returns to index. 
         */
        if($company == false)
        {
            session()->flash('error', 'A company already exists. We are yet to support multiple companies.');

            return redirect()->route('admin.company.index');
        }

        else{
            session()->flash('success', 'Your company has been stored.');

            return redirect()->route('admin.company.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $company = CompanyService::searchBySlug($slug);

        return view('admin.company.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($slug)
    {
        $company = CompanyService::searchBySlug($slug);

        $countries = InternationalizationService::countries();

        return view('admin.company.edit', compact('company', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $slug)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'address' => ['string'],
            'website' => ['url'],
            'phone' => ['string'],
            'email' => ['email'],
            'tax_id' => ['string'],
            'logo' => ['image', 'mimes:jpeg,png,jpg,gif,svg'],
            'country' => ['string'],
        ]);

        $company = CompanyService::update($validated, $slug);
        
        return redirect()->route('admin.company.show', $company->slug);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CompanyDetail $companyDetail)
    {
        //
    }

    /**
     *  Export xlsx
     */
    public function xlsx()
    {
        dd('we here');

        $file = ExportDataService::companyXlsx();

        return $file;
    }

    /**
     *  Export csv
     */
    public function csv()
    {
        $file = CompanyDetailExport::companyCsv();

        return $file;
    }
}

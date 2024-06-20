<?php

namespace App\Services;

use App\Models\CompanyDetail;
use App\Services\SlugService;

/**
 *  This service does most of the actual transactions for CompanyDetail model.
 *  Form data coming here is always $validated, regardless of contents. 
 */
class CompanyService
{
    /**
     *  Get companies stored in db
     *  Returns a collection
     */  
    public static function companies()
    {
        $companies = CompanyDetail::paginate(5);

        return $companies;
    }

    /**
     *  Generate slug using $validated['name']
     *  Add slug to $validated array
     *  Store $validated data
     *  Return an instance of stored data
     */ 
    public static function store($validated)
    {
        
        $slug = SlugService::make($validated['name']);

        $status = StatusService::active();

        $logo = $validated['logo']->store('companyImages', ['disk' => 'public']);

        $validated['slug'] = $slug;

        $validated['status_id'] = $status->id;

        $validated['user_id'] = auth()->id();

        $validated['logo'] = $logo;

        $company = CompanyDetail::create($validated);

        return $company;
    }

    /**
     * Search for company using form input data
     *  Returns a collection
     */
    public static function search($validated)
    {
        $name = $validated['name'];

        $companies = CompanyDetail::where('name', 'LIKE', "%$name%")->get();

        return $companies;
    }

    /**
     *  Search for a company by id.
     *  Returns a single object
     */
    public static function searchById($id)
    {
        $company = CompanyDetail::where('id', $id)->first();

        return $company;
    }

    /**
     *  Search for a company by slug.
     *  Returns a single object
     */
    public static function searchBySlug($slug)
    {
        $company = CompanyDetail::where('slug', $slug)->first();

        return $company;
    }
}
<?php

namespace App\Services;

use App\Models\Tax;
use App\Services\StatusService;
use App\Services\SlugService;

class TaxService
{
    /**
     *  Get all active taxes.
     *  Returns a collection.
     */
    public static function taxes()
    {
        $status = StatusService::active();

        $taxes = Tax::where('status_id', $status->id)->get();

        return $taxes;
    }

    /**
     *  Search for a tax by its name.
     *  Returns a collection of items similar to search term.
     */
    public static function search($validated)
    {
        $name = $validated['name'];

        $taxes = Tax::where('name', "LIKE", "%$name%")->get();

        return $taxes;
    }

    /**
     *  Search for a tax by its slug.
     *  Returns a singleton.
     */
    public static function searchBySlug($slug)
    {
        $tax = Tax::where('slug', $slug)->first();

        return $tax;
    }

    /**
     *  Store a new tax. 
     *  Returns the stored tax.
     */
    public static function store($validated)
    {
        $slugData = $validated['name'].'-'.$validated['amount'];

        $validated['slug'] = SlugService::make($slugData);

        $status = StatusService::active();

        $validated['status_id'] = strval($status->id);

        $tax = Tax::create($validated);

        return $tax;
    }

    /**
     *  Update an existing tax.
     *  Returns the updated object.
     */
    public static function update($validated, $slug)
    {
        $tax = self::searchBySlug($slug);

        $tax->update($validated);

        return $tax;
    }
}
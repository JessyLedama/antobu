<?php 

namespace App\Services;

use App\Models\Status;

class StatusService
{
    // get statuses
    public static function statuses()
    {
        $statuses = Status::all();

        return $statuses;
    }

    // store a new status
    public static function store($validated)
    {
        $slugData = $validated['name'];

        $slug = SlugService::make($slugData);

        $statusData = [
            'name' => $validated['name'],
            'slug' => $slug,
        ];

        $status = Status::create($statusData);

        return $status;
    }

    // get draft(inactive) status
    public static function inactive()
    {
        $status = Status::where('slug', 'inactive')->first();

        return $status;
    }

    // get active status
    public static function active()
    {
        $status = Status::where('slug', 'active')->first();

        return $status;
    }

    /** 
     *  Search for a status.
     *  This method is to be used by form data, 
     *  So information coming in should be $validated.
     *  Returns a collection of all matches.
     */
    public static function search($validated)
    {
        $name = $validated['name'];

        $statuses = Status::where('name', 'LIKE', "%$name%")->get();

        return $statuses;
    }

    /**
     *  Search for a status by its id.
     *  Returns a single object.
     */
    public static function find($id)
    {
        $status = Status::where('id', $id)->first();

        return $status;
    }

    /**
     *  Search for a status by slug.
     *  Returns a single object. 
     */
    public static function searchBySlug($slug)
    {
        $status = Status::where('slug', $slug)->first();

        return $status;
    }
}
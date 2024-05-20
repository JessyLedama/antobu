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
}
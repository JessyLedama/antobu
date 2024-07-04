<?php

namespace App\Services;

use App\Models\Newsletter;
use App\Services\SlugService;

class NewsletterService
{
    /**
     *  Get all newsletters.
     *  Returns a collection 
     */
    public static function newsletters()
    {
        $status = StatusService::active();

        $newsletters = Newsletter::where('status_id', $status->id)->paginate(10);

        return $newsletters;
    }

    /**
     *  Store a new newsletter.
     *  Form data gets here as $validated.
     *  Returns the stored object. 
     */
    public static function store($validated)
    {
        $slug = SlugService::make($validated['name']);

        $status = StatusService::active();

        if(isset($validated['cover']))
        {
            $cover = $validated['cover']->store('newsletterCovers', ['disk' => 'public']);
        }

        $newsletterData = [
            'name' => $validated['name'],
            'slug' => $slug,
            'content' => $validated['content'],
            'cover' => $cover ?? '',
            'status_id' => $status->id,
        ];

        $newsletter = Newsletter::create($newsletterData);

        return $newsletter;
    }

    /**
     *  Search for a newsletter by slug.
     *  Returns an object.
     */
    public static function searchBySlug($slug)
    {
        $newsletter = Newsletter::where('slug', $slug)->firstOrFail();

        return $newsletter;
    }
}
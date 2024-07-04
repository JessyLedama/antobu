<?php

namespace App\Services;

use App\Models\NewsletterSubscriber;

class NewsletterSubscriberService
{
    /**
     *  Get all newsletter subscribers.
     *  Returns a collection.
     */
    public static function subscribers()
    {
        $subscibers = NewsletterSubscriber::all();

        return $subscibers;
    }

    /**
     *  Store a new subscriber.
     *  As this is form data, it always comes to the service as $validated.
     *  Returns the stored object.
     */
    public static function store($validated)
    {
        $subsciber = NewsletterSubscriber::create($validated);

        session()->flash('success', 'Thank you for subscribing to our newsletter.');

        return $subsciber;
    }
}
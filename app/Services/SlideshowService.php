<?php 

namespace App\Services;

use App\Models\Slideshow;

class SlideshowService
{
    // get slides
    public static function slides()
    {
        $slides = Slideshow::all();

        return $slides;
    }

    // store a new slide.
    public static function store($validated)
    {
        $slugData = $validated['name'];

        $slug = SlugService::make($slugData);

        $image = $validated['image']->store('slides', ['disk' => 'public']);

        $slideData = [
            'name' => $validated['name'],
            'slug' => $slug,
            'image' => $image,
            'caption' => $validated['caption'],
        ];

        $slide = Slideshow::create($slideData);

        return $slide;
    }

    /**
     *  Search for a slideshow by its slug.
     *  Returns a single object.
     */
    public static function searchBySlug($slug)
    {
        $slide = Slideshow::where('slug', $slug)->first();

        return $slide;
    }

    /**
     *  Update an existing slideshow
     *  Returns the updated slideshow.
     */
    public static function update($validated, $slug)
    {
        $slide = self::searchBySlug($slug);

        $validated['slug'] = SlugService::make($validated['name']);

        $slide->update($validated);

        session()->flash('success', 'Slideshow updated.');

        return $slide;
    }
}
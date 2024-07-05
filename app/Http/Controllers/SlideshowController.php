<?php

namespace App\Http\Controllers;

use App\Services\SlideshowService;
use Illuminate\Http\Request;

class SlideshowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $slides = SlideshowService::slides();

        return view('admin.slide.index', compact('slides'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.slide.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['string', 'required', 'max:255', 'unique:slideshows'],
            'image' => ['image', 'mimes:jpg,jpeg,png,gif,svg', 'max:5000'],
            'caption' => ['string', 'max:1000'],
        ]);

        $slide = SlideshowService::store($validated);

        session()->flash('success', 'Slideshow has been stored.');

        return redirect()->route('admin.slide.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Slideshow $slideshow)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($slug)
    {
        $slide = SlideshowService::searchBySlug($slug);

        return view('admin.slide.edit', compact('slide'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Slideshow $slideshow)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slideshow $slideshow)
    {
        //
    }
}

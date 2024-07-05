<?php

namespace App\Http\Controllers;

use App\Services\ThemeService;
use Illuminate\Http\Request;

class ThemeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $themes = ThemeService::themes();

        return view('admin.theme.index', compact('themes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.theme.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'unique:themes', 'max:255'],
            'favicon' => ['mimes:jpg,jpeg,png,gif,svg'],
            'primary_color' => ['string'],
            'secondary_color' => ['string'],
            'title_font' => ['string'],
            'content_font' => ['string'],
            'header_color' => ['string'],
            'footer_color' => ['string'],
        ]);

        $theme = ThemeService::store($validated);

        return redirect()->route('admin.theme.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $theme = ThemeService::searchBySlug($slug);
        
        return view('admin.theme.show', compact('theme'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($slug)
    {
        $theme = ThemeService::searchBySlug($slug);

        return view('admin.theme.edit', compact('theme'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $slug)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'favicon' => ['mimes:jpg,jpeg,png,gif,svg', 'max:5000'],
            'primary_color' => ['string'],
            'secondary_color' => ['string'],
            'title_font' => ['string'],
            'content_font' => ['string'],
            'header_color' => ['string'],
            'footer_color' => ['string'],
            'primary_button' => ['string'],
            'secondary_button' => ['string']
        ]);

        $theme = ThemeService::update($validated, $slug);

        return redirect()->route('admin.theme.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($slug)
    {
        //
    }

    /**
     *  Activate a theme.
     */
    public function activate($slug)
    {
        $theme = ThemeService::activate($slug);

        return back();
    }
}

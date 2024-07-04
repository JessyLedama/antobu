<?php

namespace App\Http\Controllers;

use App\Services\NewsletterService;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $newsletters = NewsletterService::newsletters();

        return view('admin.newsletter.index', compact('newsletters'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.newsletter.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:newsletters'],
            'cover' => ['mimes:jpg,jpeg,png,gif,svg'],
            'content' => ['required', 'string'],
        ]);

        $newsletter = NewsletterService::store($validated);

        return redirect()->route('admin.newsletter.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $newsletter = NewsletterService::searchBySlug($slug);

        return view('newsletter', compact('newsletter'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Newsletter $newsletter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Newsletter $newsletter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Newsletter $newsletter)
    {
        //
    }
}

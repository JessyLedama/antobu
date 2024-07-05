<?php

namespace App\Services;

use App\Models\Theme;
use App\Services\SlugService;
use App\Services\StatusService;

class ThemeService
{
    /**
     *  Get themes.
     *  Returns a collection.
     */
    public static function themes()
    {
        $theme = Theme::paginate(5);

        return $theme;
    }

    /**
     *  Store a new theme.
     *  A company can have multiple themes, but only one may be active at a time
     *  Form data always comes to the service as $validated.
     */
    public static function store($validated)
    {
        $slug = SlugService::make($validated['name']);
        $status = StatusService::inactive();

        $favicon = $validated['favicon']->store('favicons', ['disk' => 'public']);

        $validated['slug'] = $slug;
        $validated['status_id'] = $status->id;
        $validated['favicon'] = $favicon;

        $theme = Theme::create($validated);

        session()->flash('success', 'Theme stored.');

        return $theme;
    }

    /**
     *  Get the active theme.
     *  Returns an object.
     */
    public static function active()
    {
        $status = StatusService::active();

        $theme = Theme::where('status_id', $status->id)->first();

        return $theme;
    }

    /**
     *  Search for a theme by its slug.
     *  Returns a single object
     */
    public static function searchBySlug($slug)
    {
        $theme = Theme::where('slug', $slug)->first();

        return $theme;
    }

    /**
     *  Update an existing theme.
     *  Returns the updated object.
     */
    public  static function update($validated, $slug)
    {
        $theme = self::searchBySlug($slug);

        if(isset($validated['favicon']))
        {
            $favicon = $validated['favicon']->store('favicons', ['disk' => 'public']);

            $validated['favicon'] = $favicon;
        }

        $theme->update($validated);

        $theme->save();

        return $theme;
    }

    /**
     *  Activate a theme. 
     *  To activate a new theme, first deactivate the currently active theme.
     */
    public static function activate($slug)
    {
        // get the statuses
        $activeStatus = StatusService::active();
        $inactiveStatus = StatusService::inactive();

        // theme to be activated
        $theme = self::searchBySlug($slug);

        // currently active theme
        $active = Theme::where('status_id', $activeStatus->id)->first();

        // deactivate active theme
        $active->status_id = $inactiveStatus->id;
        $active->save();

        // activate theme
        $theme->status_id = $activeStatus->id;
        $theme->save();

        return true;
    }
}
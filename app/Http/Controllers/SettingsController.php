<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CompanyService;
use App\Services\ThemeService;
use App\Services\SettingsService;

class SettingsController extends Controller
{
    /**
     *  Get the settings page
     */
    public function index()
    {
        $counts = SettingsService::counts();

        return view('admin.settings', compact('counts'));
    }
}

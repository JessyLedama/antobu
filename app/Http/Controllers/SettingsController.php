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

        // get chart for orders
        $users = SettingsService::usersChart();

        $usersChart = [
            'labels' => $users->pluck('date')->toArray(),
            'data' => $users->pluck('count')->toArray(),
        ];

        $usersChart = json_encode($usersChart);

        // get chart for companies
        $companies = SettingsService::companiesChart();

        $companiesChart = [
            'labels' => $companies->pluck('date')->toArray(),
            'data' => $companies->pluck('count')->toArray(),
        ];

        $companiesChart = json_encode($companiesChart);

        return view('admin.settings', compact('counts', 'usersChart', 'companiesChart'));
    }
}

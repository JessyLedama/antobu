<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\DashboardService;

class DashboardController extends Controller
{
    // get dashboard
    public function index()
    {
        $counts = DashboardService::counts();

        $orders = DashboardService::ordersChart();

        $ordersChart = [
            'labels' => $orders->pluck('date'),
            'data' => $orders->pluck('count'),
        ];

        $ordersChart = json_encode($ordersChart);

        return view('admin.dashboard', compact('counts', 'ordersChart'));
    }
}

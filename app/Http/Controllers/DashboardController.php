<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\DashboardService;

class DashboardController extends Controller
{
    // get dashboard
    public function index()
    {
        // this one gets all counts for the cards
        $counts = DashboardService::counts();

        // get chart for orders
        $orders = DashboardService::ordersChart();

        $ordersChart = [
            'labels' => $orders->pluck('date')->toArray(),
            'data' => $orders->pluck('count')->toArray(),
        ];

        $ordersChart = json_encode($ordersChart);

        // get chart for products
        $products = DashboardService::productsChart();
        $productsChart = [
            'labels' => $products->pluck('date')->toArray(),
            'data' => $products->pluck('count')->toArray(),
        ];
        $productsChart = json_encode($productsChart);

        return view('admin.dashboard', compact('counts', 'ordersChart', 'productsChart'));
    }
}

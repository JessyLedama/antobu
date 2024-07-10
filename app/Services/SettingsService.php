<?php

namespace App\Services;

use DB;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Models\CompanyDetail;

class SettingsService
{
    // get counts
    public static function counts()
    {
        $counts = DB::select(
            'SELECT
                (SELECT COUNT(*) FROM users) AS users_count,
                (SELECT COUNT(*) FROM company_details) AS companies_count,
                (SELECT COUNT(*) FROM product_categories) AS product_categories_count,
                (SELECT COUNT(*) FROM slideshows) AS slideshows_count,
                (SELECT COUNT(*) FROM statuses) AS statuses_count,
                (SELECT COUNT(*) FROM themes) AS themes_count,
                (SELECT COUNT(*) FROM roles) AS roles_count,
                (SELECT COUNT(*) FROM permissions) AS permissions_count
            '
        );

        $counts = $counts[0];

        return $counts;
    }
}
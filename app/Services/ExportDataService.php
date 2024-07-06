<?php

namespace App\Services;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProductsExport;
use App\Exports\CompanyDetailExport;

/**
 *  This service will handle all data exports.
 */
class ExportDataService
{
    /**
     *  Export products
     */
    public static function productsXlsx()
    {
        $file = Excel::download(new ProductsExport, 'products.xlsx');

        return $file;
    }

    public static function productsCsv()
    {
        $file = Excel::download(new ProductsExport, 'products.csv');

        return $file;
    }

    /**
     *  Export Company Details
     */
    public static function companyXlsx()
    {
        $file = Excel::download(new CompanyDetailExport, 'company.xlsx');

        return $file;
    }

    public static function companyCsv()
    {
        $file = Excel::download(new CompanyDetailExport, 'company.csv');

        return $file;
    }
}
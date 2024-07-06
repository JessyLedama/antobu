<?php

namespace App\Exports;

use App\Services\CompanyService;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CompanyDetailExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $company = CompanyService::company();

        return $company;
    }

    /**
     *  Headings for exported file
     */
    public function headings(): array
    {
        return [
            '#', 'name', 'address', 'website', 'phone', 'email', 'tax_id', 'country', 'status'
        ];
    }
}

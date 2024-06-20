<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductsExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $products = Product::with(['category', 'status', 'user'])->get();

        return $products->map(function($product)
        {
            return [
                'name' => $product->name,
                'slug' => $product->slug,
                'price' => $product->price,
                'user' => $product->user->name,
                'status' => ucwords($product->status->name),
                // 'category' => $product->category->name, //some products dont have a category. should work fine in a fresh database.
            ];
        });
    }

    /**
     * Define the headings for the exported file.
     *
     * @return array
     */
    public function headings(): array
    {
        return [
            'Name',
            'Slug',
            'Price (KSH)',
            'User Id',
            'Status Id',
            'Category Id'
        ];
    }
}

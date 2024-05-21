<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Services\ProductService;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;
use Illuminate\Http\UploadedFile;
use Illuminate\Http\File;
use App\Services\SlugService;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = ProductService::products();

        if($products->isEmpty())
        {
            // digital assets datas
            $digitalAssetDatas = [
                [
                    'name' => 'HP Laptop',
                    'price' => '99000',
                    'imageFile' => file_get_contents(public_path('images/hp.png')),
                    'assetFile' => file_get_contents(public_path('images/1.zip')),
                ],

                [
                    'name' => 'Dell Laptop',
                    'price' => '75000',
                    'imageFile' => file_get_contents(public_path('images/dell.jpeg')),
                    'assetFile' => file_get_contents(public_path('images/2.zip')),
                ],

                [
                    'name' => 'Lenovo Laptop',
                    'price' => '66000',
                    'imageFile' => file_get_contents(public_path('images/lenovo.png')),
                    'assetFile' => file_get_contents(public_path('images/1.zip')),
                ],

                [
                    'name' => 'Bose Headphones',
                    'price' => '15000',
                    'imageFile' => file_get_contents(public_path('images/bose.jpg')),
                    'assetFile' => file_get_contents(public_path('images/1.zip')),
                ],

                [
                    'name' => 'Behringer Headphones',
                    'price' => '25000',
                    'imageFile' => file_get_contents(public_path('images/behringer.png')),
                    'assetFile' => file_get_contents(public_path('images/1.zip')),
                ],

                [
                    'name' => 'Beats By Dre',
                    'price' => '40000',
                    'imageFile' => file_get_contents(public_path('images/beats.jpg')),
                    'assetFile' => file_get_contents(public_path('images/1.zip')),
                ],

                [
                    'name' => 'Samsung TV',
                    'price' => '150000',
                    'imageFile' => file_get_contents(public_path('images/samsung.jpg')),
                    'assetFile' => file_get_contents(public_path('images/1.zip')),
                ],

                [
                    'name' => 'Sony TV',
                    'price' => '70000',
                    'imageFile' => file_get_contents(public_path('images/sony.png')),
                    'assetFile' => file_get_contents(public_path('images/1.zip')),
                ],

                [
                    'name' => 'LG TV',
                    'price' => '68000',
                    'imageFile' => file_get_contents(public_path('images/lg.jpg')),
                    'assetFile' => file_get_contents(public_path('images/1.zip')),
                ],
            ];

            foreach($digitalAssetDatas as $data)
            {
                // create a temporary file
                $temp = tempnam(sys_get_temp_dir(), 'image_');

                $tempAsset = tempnam(sys_get_temp_dir(), 'asset_');
                
                file_put_contents($temp, $data['imageFile']);

                file_put_contents($tempAsset, $data['assetFile']);

                // create a file instance
                $file = new File($temp);

                $assetFile = new File($tempAsset);

                // create an uploaded file instance
                $uploadedFile = new UploadedFile(
                    $file->getPathname(),
                    $file->getFilename(),
                    $file->getMimeType(),
                );

                $uploadedAsset = new UploadedFile(
                    $assetFile->getPathname(),
                    $assetFile->getFilename(),
                    $assetFile->getMimeType(),
                );

                $path = $uploadedFile->store('digitalAssetImages', ['disk' => 'public']);

                $assetPath = $uploadedAsset->store('digitalAssets', ['disk' => 'public']);

                unlink($temp);

                unlink($tempAsset);

                $products = [];

                $productData = [
                    'name' => $data['name'],
                    'slug' => SlugService::make($data['name']),
                    'price' => $data['price'],
                    'image' => $path,
                    'digital_asset' => $assetPath,
                    'user_id' => '1',
                    'status_id' => '1', 
                ];

                array_push($products, $productData);

                foreach($products as $productDetails)
                {
                    Product::create($productDetails);
                }
            }
        }
    }
}

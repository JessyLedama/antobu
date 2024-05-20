<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Services\ProductService;
use Illuminate\Support\Facades\Storage;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $imagesPath = 'public/images/icons/';
        $assetsPath = 'public/images/assets/';

        $products = ProductService::products();

        if($products->isEmpty())
        {
            // digital asset images
            $hpLaptop = public_path('images/hp.png');
            $hpLaptop = file_get_contents($hpLaptop);
            $hpLaptop = Storage::disk('public')->put('digitalAssetImages', $hpLaptop);

            $dell = public_path('images/dell.jpeg');
            $dell = file_get_contents($dell);
            $dell = Storage::disk('public')->put('digitalAssetImages/', $dell);

            $lenovo = public_path('images/lenovo.png');
            $lenovo = file_get_contents($lenovo);
            $lenovo = Storage::disk('public')->put('digitalAssetImages/', $lenovo);

            $bose = public_path('images/bose.jpg');
            $bose = file_get_contents($bose);
            $bose = Storage::disk('public')->put('digitalAssetImages/', $bose);

            $behringer = public_path('images/behringer.png');
            $behringer = file_get_contents($behringer);
            $behringer = Storage::disk('public')->put('digitalAssetImages/', $behringer);

            $beats = public_path('images/beats.jpg');
            $beats = file_get_contents($beats);
            $beats = Storage::disk('public')->put('digitalAssetImages/', $beats);

            $samsung = public_path('images/samsung.jpg');
            $samsung = file_get_contents($samsung);
            $samsung = Storage::disk('public')->put('digitalAssetImages/', $samsung);

            $sony = public_path('images/sony.png');
            $sony = file_get_contents($sony);
            $sony = Storage::disk('public')->put('digitalAssetImages/', $sony);

            $lg = public_path('images/lg.jpg');
            $lg = file_get_contents($lg);
            $lg = Storage::disk('public')->put('digitalAssetImages/', $lg);

            // digital assets
            $asset1 = public_path('images/1.zip');
            $asset1 = file_get_contents($asset1);
            $asset1 = Storage::disk('public')->put('digitalAssets/', $asset1);

            $asset2 = public_path('images/2.zip');
            $asset2 = file_get_contents($asset2);
            $asset2 = Storage::disk('public')->put('digitalAssets/', $asset2);

            $asset3 = public_path('images/3.zip');
            $asset3 = file_get_contents($asset3);
            $asset3 = Storage::disk('public')->put('digitalAssets/', $asset3);

            $asset4 = public_path('images/4.zip');
            $asset4 = file_get_contents($asset4);
            $asset4 = Storage::disk('public')->put('digitalAssets/', $asset4);

            $asset5 = public_path('images/5.zip');
            $asset5 = file_get_contents($asset5);
            $asset5 = Storage::disk('public')->put('digitalAssets/', $asset5);

            $asset6 = public_path('images/6.zip');
            $asset6 = file_get_contents($asset6);
            $asset6 = Storage::disk('public')->put('digitalAssets/', $asset6);

            $asset7 = public_path('images/7.zip');
            $asset7 = file_get_contents($asset7);
            $asset7 = Storage::disk('public')->put('digitalAssets/', $asset7);

            $asset8 = public_path('images/8.zip');
            $asset8 = file_get_contents($asset8);
            $asset8 = Storage::disk('public')->put('digitalAssets/', $asset8);

            $asset9 = public_path('images/9.zip');
            $asset9 = file_get_contents($asset9);
            $asset9 = Storage::disk('public')->put('digitalAssets/', $asset9);

            $productDatas = [
                [
                    'name' => 'HP Laptop',
                    'slug' => 'hp-laptop',
                    'price' => '99000',
                    'image' => $hpLaptop,
                    'digital_asset' => $asset1,
                    'user_id' => '1',
                    'status_id' => '1',
                ],

                [
                    'name' => 'Dell Laptop',
                    'slug' => 'dell-laptop',
                    'price' => '70000',
                    'image' => $dell,
                    'digital_asset' => $asset2,
                    'user_id' => '1',
                    'status_id' => '1',
                ],

                [
                    'name' => 'Lenovo Laptop',
                    'slug' => 'lenovo-laptop',
                    'price' => '109000',
                    'image' => $lenovo,
                    'digital_asset' => $asset3,
                    'user_id' => '1',
                    'status_id' => '1',
                ],

                [
                    'name' => 'BOSE Headphones',
                    'slug' => 'bose-headphones',
                    'price' => '20000',
                    'image' => $bose,
                    'digital_asset' => $asset4,
                    'user_id' => '1',
                    'status_id' => '1',
                ],

                [
                    'name' => 'Behringer Headphones',
                    'slug' => 'behringer-headphones',
                    'price' => '20000',
                    'image' => $behringer,
                    'digital_asset' => $asset5,
                    'user_id' => '1',
                    'status_id' => '1',
                ],

                [
                    'name' => 'BEATS Headphones',
                    'slug' => 'beats-headphones',
                    'price' => '20000',
                    'image' => $beats,
                    'digital_asset' => $asset6,
                    'user_id' => '1',
                    'status_id' => '1',
                ],

                [
                    'name' => 'Samsung TV',
                    'slug' => 'samsung-tv',
                    'price' => '55000',
                    'image' => $samsung,
                    'digital_asset' => $asset7,
                    'user_id' => '1',
                    'status_id' => '1',
                ],

                [
                    'name' => 'Sony TV',
                    'slug' => 'sony-tv',
                    'price' => '45000',
                    'image' => $sony,
                    'digital_asset' => $asset8,
                    'user_id' => '1',
                    'status_id' => '1',
                ],

                [
                    'name' => 'LG TV',
                    'slug' => 'lg-tv',
                    'price' => '25000',
                    'image' => $lg,
                    'digital_asset' => $asset9,
                    'user_id' => '1',
                    'status_id' => '1',
                ],
            ];

            foreach($productDatas as $productDetails)
            {
                ProductService::store($productDetails);
            }
        }
    }
}

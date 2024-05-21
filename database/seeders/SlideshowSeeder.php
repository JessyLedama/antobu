<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Http\UploadedFile;
use Illuminate\Http\File;
use App\Models\Slideshow;
use App\Services\SlugService;

class SlideshowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $slides = Slideshow::all();

        if($slides->isEmpty())
        {
            // digital assets datas
            $slideDatas = [
                [
                    'name' => 'Example Headline',
                    'image' => file_get_contents(public_path('images/carousel/1.svg')),
                    'caption' => 'Some representative placeholder content for the first slide of the carousel.'
                ],

                [
                    'name' => 'Another example headline.',
                    'image' => file_get_contents(public_path('images/carousel/2.jpg')),
                    'caption' => 'Some representative placeholder content for the second slide of the carousel. ',
                ],

                [
                    'name' => 'One more for good measure.',
                    'image' => file_get_contents(public_path('images/carousel/3.jpg')),
                    'caption' => 'Some representative placeholder content for the third slide of this carousel',
                ],
            ];

            foreach($slideDatas as $data)
            {
                // create a temporary file
                $temp = tempnam(sys_get_temp_dir(), 'image_');
                
                file_put_contents($temp, $data['image']);

                // create a file instance
                $file = new File($temp);

                // create an uploaded file instance
                $uploadedFile = new UploadedFile(
                    $file->getPathname(),
                    $file->getFilename(),
                    $file->getMimeType(),
                );

                $path = $uploadedFile->store('digitalAssetImages', ['disk' => 'public']);

                unlink($temp);

                $slideshows = [];

                $slideshowData = [
                    'name' => $data['name'],
                    'slug' => SlugService::make($data['name']),
                    'image' => $path,
                    'caption' => $data['caption'], 
                ];

                array_push($slideshows, $slideshowData);

                foreach($slideshows as $slideshowDetails)
                {
                    Slideshow::create($slideshowDetails);
                }
            }
        }
    }
}

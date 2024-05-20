<?php

namespace App\Services;

class SlugService 
{
    // generate slug from string
    public static function make($slugData)
    {
        $slug = strtolower(str_replace(' ', '-', $slugData));

        return $slug;
    }
}
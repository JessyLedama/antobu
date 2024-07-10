<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $fillable = ['name' 'slug' 'cover_image', 'content' 'more_images', 'status_id', 'seo_keywords'];

    /**
     *  Page belongsTo status
     */
    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }
}

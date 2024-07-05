<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'favicon', 'primary_color', 'secondary_color', 'title_font', 'content_font', 'status_id', 'header_color', 'footer_color', 'primary_button', 'secondary_button', 'navigation_brand'];

    /**
     *  A theme belongsTo() a status
     */
    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'slug', 'address', 'website', 'phone', 'email', 'tax_id', 'logo', 'country', 'status_id', 'user_id',
    ];

    protected $hidden = [
        'slug'
    ];

    /**
     *  Company belongsTo status
     */
    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }
}

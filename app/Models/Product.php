<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, softDeletes;
    protected $fillable = [
        'slug','name','description','price','sku','quantity','is_published'
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}

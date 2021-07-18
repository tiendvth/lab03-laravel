<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'name',
        'price',
        'thumbnail',
        'images',
        'description',
        'sale',
    ];

    public function categories(){
        return $this->belongsTo(Category::class,'category_id');
    }
    public function product_options(){
        return $this->hasMany(Product_options::class);
    }


}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_options extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'product_id',
        'size_id',
        'color_id',
        'quantity'
    ];
    public function products(){
        return $this->belongsTo(Product::class,'product_id');
    }

    public function sizes(){
        return $this->belongsTo(Size::class,'size_id');
    }

    public function colors(){
        return $this->belongsTo(Color::class,'color_id');
    }


}

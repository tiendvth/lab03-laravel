<?php

namespace App\Http\Controllers;

use App\Enums\Product_option_status;
use App\Models\Product_options;
use Illuminate\Http\Request;

class ProductOptionsController extends Controller
{
    public function list(){
        $options = Product_options::query()->where('status','=',Product_option_status::ACTIVE)->with('products')->with('colors')->with('sizes')->get();
//        return $options[0];
        return view('Admin.product_option',['options'=>$options]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Enums\Product_status;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\Product_options;
use App\Models\Size;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function list(){
        $colors = Color::all();
        $sizes = Size::all();
        $category = Category::all();
        $products = Product::query()->where('status','=',Product_status::ACTIVE)->with('categories')->paginate(10);
        return view('Admin.products',[
            'products'=>$products,
            'colors'=>$colors,
            'sizes'=>$sizes,
            'categories'=>$category,
            ]);
    }



    public function store(Request $request){
        $product = new Product();
        $product->fill($request->all());
        $product->save();
        $product_options = json_decode($request->data_option,true);
        for ($i = 0 ; $i < sizeof($product_options); $i++){
            $product_option = new Product_options();
            $product_option->product_id = $product->id;
            $product_option->size_id = $product_options[$i]["size_id"];
            $product_option->color_id = $product_options[$i]["color_id"];
            $product_option->quantity = $product_options[$i]["quantity"];
            $product_option->save();
        }
        return back();
    }
}

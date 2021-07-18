<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function list(){
        $colors = Color::all();
        return view('Admin.colors',['colors'=>$colors->reverse()]);
    }


    public function store(Request $request){
        $color = new Color();
        $color->fill($request->all());
        $color->save();
        return back();
    }
}

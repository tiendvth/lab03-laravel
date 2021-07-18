<?php

namespace App\Http\Controllers;

use App\Enums\Size_status;
use App\Models\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    public function list(){
        $sizes = Size::query()->where('status','=',Size_status::ACTIVE)->paginate(10);
        return view('Admin.sizes',['sizes'=>$sizes]);
    }

    public function store(Request $request){
        $size = new Size();
        $size->fill($request->all());
        $size->save();
        return back();
    }
}

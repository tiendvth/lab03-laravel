<?php

namespace App\Http\Controllers;

use App\Enums\Category_status;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function list()
    {
        $categories = Category::query()->where('status','=',Category_status::ACTIVE)->paginate(10);
        return view('Admin.categories',['categories'=>$categories]);
    }

    public function store(Request $request)
    {
        $caterogy = new Category();
        $caterogy->fill($request->all());
        $caterogy->save();
        return back();
    }


}

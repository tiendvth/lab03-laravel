<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderDetailController extends Controller
{
    public function list(){
        return view('Admin.order_details');
    }
}

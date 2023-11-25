<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
   

    public function index()
    {

        $dishes = Dish::OrderBy('id','desc')->get();
        return view('order_form', compact('dishes'));
    }

    public function submit(Request $request)
    {
        dd(array_filter($request->except('_token')));
    }
}

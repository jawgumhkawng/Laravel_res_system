<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use App\Models\User;
use App\Models\Order;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Dish $dish, Category $category, User $user, Order $order)
    {
        $dishs = Dish::all();
        $users = User::all();
        $categories = Category::all();
      
        return view('/home', compact('dishs','categories','users'));
    }

      public function admin(Dish $dish, Category $category, User $user, Order $order)
    {
        $dish = Dish::all();
        $user = User::all();
        $category = Category::all();
        
        return view('layouts.master', compact('dish','category','user'));
    }

    
}
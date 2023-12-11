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
        $dishs = Dish::count();
        $users = User::count();
        $categories = Category::count();
        $orders = Order::count();
      
        return view('/home', compact('dishs','categories','users','orders'));
    }

      public function admin(Dish $dish, Category $category, User $user, Order $order)
    {
        $dishs = Dish::count();
        $orders = Order::count();
        $categories = Category::count();
        
        return view('layouts.master', compact('dishs','categories','orders'));
    }

    
}
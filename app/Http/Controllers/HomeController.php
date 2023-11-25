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
        $dishes = Dish::all();
        $users = User::all();
        $categories = Category::all();
        // $rawstatus = config('res.order_status');
        // $status = array_flip($rawstatus);
        // $orders = Order::whereIn('status',1)->get();
        return view('/home', compact('dishes','categories','users'));
    }

    
}

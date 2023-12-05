<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use App\Models\Order;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\DishCreateRequest;
use Illuminate\Database\Eloquent\Builder;

class DishesController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $dishes = Dish::all();
        return view('kitchen.dish', compact('dishes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $categories = Category::all();
        return view('kitchen.create_dish', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DishCreateRequest $request)
    {
        $dish = new Dish();
        $dish->name = $request->name;
        $dish->category_id = $request->category;

        $imageName = date('YmdHis'). "." .request()->dish_image->getClientOriginalExtension();
        request()->dish_image->move(public_path('images'), $imageName);

        $dish->image = $imageName;
        $dish->save();

        return redirect('dish')->with('Created', 'Dish Created Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dish $dish)
    {
       $categories = Category::all();
       return view('kitchen.edit_dish', compact('dish','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
     public function update(Request $request, Dish $dish)
    {
        request()->validate([
            'name' => 'required',
            'category' => 'required',
        ]);

        $dish->name = $request->name;
        $dish->category_id = $request->category;

        if($request->dish_image){
            $imageName = date('YmdHis'). "." .request()->dish_image->getClientOriginalExtension();
            request()->dish_image->move(public_path('images'), $imageName);
            $dish->image = $imageName;
        }

        $dish->save();

        return redirect('dish')->with('Updated', 'Dish Updated Successfully!');
    }


   
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dish $dish)
    {
        $dish->delete();

        return redirect('dish')->with('Deleted', 'Dish Removed Successfully!');
    }

    public function order()
    {
        $orders = Order::whereIn('status',[1,2])->get();

        $rawstatus = config('res.order_status');
        $status = array_flip($rawstatus);

        return view('kitchen.order', compact('orders','status'));
        
    }

    public function approve(Order $order)
    {
        $order->status = config('res.order_status.processing');
        $order->save();

        return redirect('order')->with('message', 'Order Approve!');
    }

      public function cancel(Order $order)
    {
        $order->status = config('res.order_status.cancel');
        $order->save();

        return redirect('order')->with('cancel', 'Order Canceled!');
    }

      public function ready(Order $order)
    {
        $order->status = config('res.order_status.ready');
        $order->save();

        return redirect('order')->with('ready', 'Order Ready!');
    }
}
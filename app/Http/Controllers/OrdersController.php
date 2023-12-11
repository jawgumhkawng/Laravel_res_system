<?php

namespace App\Http\Controllers;

use App\Models\Dish;

use App\Models\User;
use App\Models\Order;
use App\Models\Table;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Foreach_;
use Illuminate\Contracts\Database\Eloquent\Builder;

class OrdersController extends Controller
{


    public function index(Request $request)
    {


        $tables = Table::all();
        $orders = Order::where('status', 4)->get();
        $rawstatus = config('res.order_status');
        $status = array_flip($rawstatus);

        if (isset($request->key)) {
            $key = $request->key;
            $dishes = Dish::where(function ($query) use ($key) {
                $query->where('name', 'like', '%' . $key . '%');
            })

                ->latest()
                ->paginate(3);


            return view('/order_form', compact('dishes', 'tables', 'orders', 'status'));
        } else {
            $dishes = Dish::latest()->paginate(6);

            return view('/order_form', compact('dishes', 'tables', 'orders', 'status'));
        }
    }




    // public function search(Request $request) 
    // {


    //       $key = $request->key;
    //       $dishesSearch = Dish::where(function($query) use ($key) {
    //         $query->where('name', 'like', '%' . $key .'%');

    //     })

    //     ->latest()
    //     ->paginate(3)
    //     ->withQueryString();

    //     return view('/order_form', compact('dishesSearch'));
    // }

    public function saveOrder($orderId, $dish_id, $request)
    {
        $order = new Order();
        $order->order_id = $orderId;
        $order->dish_id = $dish_id;
        $order->table_id = $request->table;
        $order->status = config('res.order_status.new');

        $order->save();
    }

    public function submit(Request $request)
    {
        $data = array_filter($request->except('_token', 'table'));
        $orderId = rand();

        foreach ($data as $key => $value) {
            if ($value > 1) {
                for ($i = 0; $i < $value; $i++) {
                    $this->saveOrder($orderId, $key, $request);
                }
            } else {

                $this->saveOrder($orderId, $key, $request);
            }
        }
        return redirect('/')->with('message', 'Order Submit Successfully');
    }

    public function serve(Order $order)
    {
        $order->status = config('res.order_status.done');
        $order->save();

        return redirect('/')->with('serve', 'Order Already Serve!');
    }
}

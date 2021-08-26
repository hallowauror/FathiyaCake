<?php

namespace App\Http\Controllers\Front;

use App\OrderItems;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mockery\Exception;
use App\Order;
use App\Product;
use Carbon\Carbon;

class CheckoutController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }

    public function index(){
         return view('home.checkout.index');
    }

    public function store(Request $request) {
        // dd($request);

        $now_date = Carbon::now();        

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'city' => 'required',
            'province' => 'required',
            'postal' => 'required',
            'phone' => 'required',
            'payment_method' => 'required',
        ]);



        $contents = Cart::instance('default')->content()->map(function($item) {
            return $item->model->name . ' ' . $item->qty;
        })->values()->toJson();

        try {
            // Insert into orders table
            $order = Order::create([
                'user_id' => auth()->user()->id,
                'date' => Carbon::now(),
                'address' => $request->address,
                'city' => $request->city,
                'province' => $request->province,
                'postal' => $request->postal,
                'telephone' => $request->phone,
                'payment_method' => $request->payment_method,
                'information' => $request->information,                
                'status' => 'Pending'
            ]);

            // Insert into order items table
            foreach (Cart::instance('default')->content() as $item) {                             
                OrderItems::create([
                    'order_id' => $order->id,
                    'product_id' => $item->model->id,
                    'quantity' => $item->qty,
                    'price' => $item->price,                    
                ]);
            }

            Cart::instance('default')->destroy();


            return redirect('/user/order/' . $order->id)->with('msg','Success Thank you');
            // Success

        } catch (Exception $e) {
            // Code
        }

    }

}

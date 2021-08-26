<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderItems;
use App\Product;
use Illuminate\Http\Request;
use Carbon\Carbon;

class OrderController extends Controller
{
    public function index() {
        $orders = Order::latest()->get();

        $now_time = Carbon::now();

        $get_orders = Order::where('status', 'Confirmed')->get();

        foreach($get_orders as $order) {
            if ($order->due_date == $now_time) {
                $order->update(['status' => 'Expired']);
            }
        }

        return view('admin.orders.index', compact('orders'));
    }


    public function confirm($id) {

        $due_date = Carbon::now()->addDays(1);

        // Find the order
        $order = Order::find($id);
        $items = OrderItems::where('order_id', $id)->get();
        foreach($items as $i => $item) {
            $pid = $item->product_id;
            $product = Product::where('id', $pid)->first();
            
            $check_stock = $product->stock - $item->quantity;                               

            if (!$check_stock >= 0) {                                
                $item->preorder = abs($check_stock); 
                 $item->save();

                $cStock = ($product->stock + abs($check_stock)) - $item->quantity;
                $product->stock = $cStock;
            } else {
                $product->stock = $product->stock - $item->quantity;                
            }
            
            $product->save(); 
            $item->save();
        }

        if ($order->payment_method == 'transfer') {
            // Update the Order
            $order->update([
                'status' => 'Confirmed',
                'due_date' => $due_date
            ]);
        } else {
            $order->update([
                'status' => 'Confirmed',                
            ]);
        }

        // Session message
        session()->flash('msg','Order has been confirmed');

        // Redirect the page
        return redirect('admin/orders');


    }

    public function process($id) {

        // Find the order
        $order = Order::find($id);

        // Update the Order
        $order->update([
            'status' => 'Processed',
            'due_date' => null
        ]);

        // Session message
        session()->flash('msg','Order has been proceed');

        // Redirect the page
        return redirect('admin/orders');
    }

    public function done($id, Request $request) {
        // dd($request);
        
        // Find the order
        $order = Order::find($id);

        if($request->status) {            
            $order->update([
                'status' => 'Sending',                
            ]);
        } else {            
            $order->update([
                'status' => 'Finished',
                'take_time' => $request->time,                
            ]);
        }


        // Session message
        session()->flash('msg','Order has been finished');

        // Redirect the page
        return redirect('admin/orders');
    }

    public function success($id) {
        
        // Find the order
        $order = Order::find($id);
        
            // Update the Order
            $order->update([
                'status' => 'Success',
                'take_time' => null,            
            ]);

        // Session Message
        session()->flash('msg','Order has been again into pending');

        // Redirect the page
        return redirect('admin/orders');
    }

    
    public function preorder() {        

        $orders = OrderItems::where('preorder', '!=', null)
        ->with('products')
        ->with(array('order' => function($query) {
            $query->with('user');
        }))
        ->get();          
                
        return view('admin.preorder.preorder', compact('orders'));
    }

    public function restock() {        
        
        $orders = OrderItems::where('preorder', '!=', null)->get();
        
        foreach ($orders as $order) {
            $product = Product::find($order->product_id);

            $product->stock += $order->preorder;
            $order->preorder = null;            

            $product->save();
            $order->save();
        }
                
        return redirect()->back();
    }


    public function pending($id){

        // Find the order
        $order = Order::find($id);

        // Update the order status

        $order->update(['status' => 'Pending']);

        // Session Message
        session()->flash('msg','Order has been again into pending');

        // Redirect the page
        return redirect('admin/orders');

    }

    public function show($id) {
        $order = Order::find($id);
        return view('admin.orders.details', compact('order'));
    }

}

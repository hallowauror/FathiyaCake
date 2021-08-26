<?php

namespace App\Http\Controllers;

use App\Product;
use App\Order;
use App\OrderItems;
use App\User;
use App\Kritik;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index() {
        $product = Product::count();
        $order = Order::count();
        $user = User::count();
        $income = OrderItems::join('orders', 'order_items.order_id', 'orders.id')
                    ->where('orders.status', 'Processed')
                    ->sum('price');
        $min_stock = Product::where('stock', '<=' , 10)->get();
        return view('admin.dashboard', compact('product','order','user', 'income', 'min_stock'));
    }

    public function report(Request $request) {
        $bulan = $request->bulan;
        $tahun = $request->tahun;
        $data['bulan'] = $bulan;
        $data['tahun'] = $tahun;
        $filtered = OrderItems::join('orders', 'order_items.order_id', 'orders.id')
                    ->join('products', 'order_items.product_id', 'products.id')
                    ->where('orders.status', 'Processed')
                    ->select('products.*', 'orders.*', 'order_items.*' , 'order_items.price as total' , 'order_items.created_at as tanggal')
                    ->whereMonth('order_items.created_at', $bulan)->whereYear('order_items.created_at', $tahun)->get();
        if (!empty($bulan) && !empty($tahun)) {
            $data['hasil'] = $filtered;
            $data['jumlah'] = collect($filtered)->sum('total');
            return view('admin.report.index', $data);
        } else {
            return view('admin.report.index', $data);
        }
    }

    public function kritik() {
        $data['kritik'] = Kritik::get();
        return view('admin.kritik.index', $data);
    }
}

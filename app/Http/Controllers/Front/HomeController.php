<?php

namespace App\Http\Controllers\Front;

use App\Product;
use App\Category;
use App\Order;
use App\Kritik;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index() {

        $products = Product::join('categories', 'products.category_id', 'categories.id')
        ->select('categories.category_name', 'products.*')
        ->inRandomOrder()->get();

        // Best Seller
        $bests = Product::query()
            ->join('order_items', 'order_items.product_id', '=', 'products.id')
            ->selectRaw('products.*, SUM(order_items.quantity) AS quantity_sold')
            ->groupBy(['products.id'])
            ->orderByDesc('quantity_sold')
            ->take(6)
            ->get();

        return view('home.index', compact('products', 'bests'));
    }

    public function product($id) {

        $product = Product::join('categories', 'products.category_id', 'categories.id')
        ->select('categories.category_name', 'products.*')->where('products.id', $id)->first();
        $products = Product::join('categories', 'products.category_id', 'categories.id')
        ->select('categories.category_name', 'products.*')->paginate(3);

        // dd($products);

        return view('home.product.index', compact('product', 'products'));
    }

    function invoice($id) {

        $order = Order::find($id);

        return view('home.invoice.invoice', compact('order'));
    }

    function howto() {
        return view('home.howto.index');
    }

    function faq() {
        return view('home.faq.index');
    }

    function suggestion() {
        return view('home.suggestion.index');
    }

    function suggestionStore(Request $request) {
        $requestData = $request->all();
        Kritik::create($requestData);
        return redirect('/');
    }
}

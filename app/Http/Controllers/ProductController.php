<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() {

        $products = Product::all();
        $category = Category::get();
        return view('admin.products.index', compact('products', 'category'));
    }

    public function create() {
        $product = new Product();
        return view('admin.products.create', compact('product'));
    }

    public function store(Request $request) {
        
        // Validate the form
        $request->validate([
            'name' => 'required',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required',
            'stock' => 'required',
            'status' => 'required',
            'description' => 'required',
            'image' => 'image|required'
        ]);

        // Upload the image
        if ($request->hasFile('image')) {
            $image = $request->image;
            $image->move('uploads', $image->getClientOriginalName());
        }

        // Save the data into database
        Product::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'stock' => $request->stock,
            'status' => $request->status,
            'description' => $request->description,
            'image' => $request->image->getClientOriginalName()

        ]);

        // Sessions Message
        $request->session()->flash('msg','Your product has been added');

        // Redirect

        return redirect('admin/products');

    }

    public function edit($id) {
        $product = Product::find($id);
        $category = Category::get();

        return view('admin.products.edit', compact('product','category'));
    }

    public function update(Request $request, $id) {
        
        // Find the product
        $product = Product::find($id);

        // Validate The form
        $request->validate([
           'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'stock' => 'required',
            'status' => 'required',
        ]);

        // Check if there is any image
        if ($request->hasFile('image')) {
            // Check if the old image exists inside folder
            if (file_exists(public_path('uploads/') . $product->image)) {
                unlink(public_path('uploads/') . $product->image);
            }

            // Upload the new image
            $image = $request->image;
            $image->move('uploads', $image->getClientOriginalName());

            $product->image = $request->image->getClientOriginalName();
        }

        // Updating the product
        $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'stock' => $request->stock,
            'status' => $request->status,
            'category_id' => $request->category_id,
            'image' => $product->image
        ]);

        // Store a message in session
        $request->session()->flash('msg', 'Product has been updated');

        // Redirect
        return redirect('admin/products');

    }

    public function show($id) {
        $product = Product::find($id);
        return view('admin.products.details', compact('product'));
    }

    public function destroy($id) {
        // Delete the product
        Product::destroy($id);

        // Store a message
        session()->flash('msg','Product has been deleted');

        // Redirect back
        return redirect('admin/products');


    }
}

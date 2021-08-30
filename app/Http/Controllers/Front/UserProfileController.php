<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Order;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserProfileController extends Controller
{
    public function index() {
        $id = auth()->user()->id;
        $user = User::where('id', $id)->first();
        $orders_unsuccess = Order::where('status', '!=', 'Success')->where('user_id', $id)->get();
        $orders_success = Order::where('status', 'Success')->where('user_id', $id)->get();

        return view('home.profile.index', compact('user', 'orders_unsuccess', 'orders_success'));
    }

    public function show($id) {
        $order = Order::find($id);        
        return view('home.profile.details', compact('order'));
    }

    public function success($id) {
        
    // Find the order
    $order = Order::find($id);
    
        // Update the Order
        $order->update([
            'status' => 'Success',
            'take_time' => null,            
        ]);

        return redirect('/user/profile');
    }

    public function verifyPayment(Request $request, $id) {
        // dd($request);
        $order = Order::find($id);
        if ($request->hasFile('payment')) {
            $payment = $request->payment;
            $payment->move('uploads', $payment->getClientOriginalName());
            $order->payment = $request->payment->getClientOriginalName();
        }
        
        if ($order->payment_method == 'transfer') {
            $order->update([
                'payment' => $order->payment,
                'status' => 'Verifying',
                'send_by' => $request->taken_by
            ]);
        } else {
            $order->update([                
                'status' => 'Verifying',
                'send_by' => $request->taken_by
            ]);
        }

        $request->session()->flash('msg', 'Wait for your payment to verified by Admin');
        return redirect()->back();
    }

    public function editProfile() {
        $id = auth()->user()->id;
        $user = User::where('id', $id)->first();
        return view('home.profile.edit', compact('user'));
    }

    // For update Profile
    public function updateProfile(Request $request) {
        // dd($request->all());
        
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|exists:users,email',
            'password' => 'nullable|min:6',
            'confirm_password' => 'nullable|same:password'
        ]);
        
        $user = auth()->user();

        $password = !empty($request->password) ? bcrypt($request->password):$user->password;
        $user->update([
            'name' => $request->name,
            'password' => $password
        ]);

        return redirect('/user/profile')->with(['success' => 'Data berhasil diperbarui!']);
    }
}

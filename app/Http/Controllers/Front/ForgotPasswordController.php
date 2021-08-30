<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\User;


class ForgotPasswordController extends Controller
{
    public function index() {
        return view('front.forgotpassword.index');
    }

    public function forgot(Request $request) {
        if($request->isMethod('post')){
            $data = $request->all();
            $userCount = User::where('email', $data['email'])->count();
        if($userCount == 0){
            return back()->withErrors([
                    'message' => 'User tidak ditemukan.'
                ]);
            }
        }
        
        $userDetails = User::where('email', $data['email'])->first();

        // Generate Random Password
        $random_password = str_random(8);
        $new_password = bcrypt($random_password); 

        User::where('email', $data['email'])->update(['password' => $new_password]);

        $email = $data['email'];
        $name = $userDetails->name;
        $messageData = [
            'email' => $email,
            'name' => $name,
            'password' => $random_password
        ];

        Mail::send('front.forgotpassword.email', $messageData, function($message) use($email){
            $message->to($email)->subject('New Password - Fathiya Cake');
        });

        return redirect('user/login')->with(['success' => 'Silahkan cek email
            anda untuk mengetahui password yang baru!']);
    }
}

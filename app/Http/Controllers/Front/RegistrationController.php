<?php

namespace App\Http\Controllers\Front;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Rules\EmailRule;

class RegistrationController extends Controller
{

    public function index() {
        return view('front.registration.index');
    }

    public function store(Request $request) {
        // dd($request);
        // Validate the user
        $request->validate([
            'name' => 'required',
            'email' => ['required', 'email', new EmailRule],
            'password' => 'required',
            'password_confirmation' => 'required|same:password',       
            new EmailRule()     
        ]);

        // Save the data
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),            
        ]);

        // Sign the user in
        // auth()->login($user);

        // Redirect to
        return redirect('/user/login')->with('success', 'Registrasi berhasil, silahkan melakukan login!');

    }

}

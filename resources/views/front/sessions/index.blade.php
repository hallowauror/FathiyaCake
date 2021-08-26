@extends('home.layouts.master')

@section('content')
<div class="container">
    <section class="login-section">
        <div class="auto-container">
            <!-- Login Form -->
            <div class="login-form">
                <h2>Masuk</h2>

                @if ( $errors->any() )

                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>

                    @endif

                    @if ( session()->has('msg') )

                        <div class="alert alert-success">{{ session()->get('msg') }}</div>

                @endif


                <!--Login Form-->
                <form method="post" action="{{ url('/user/login') }}">
                    @csrf
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" placeholder="" required>
                    </div>
                    
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" placeholder="" required>
                    </div>
                    
                    <div class="form-group">
                        <button class="theme-btn" type="submit">Masuk</button>
                    </div>

                    {{-- <div class="form-group">
                        <input type="checkbox" name="shipping-option" id="account-option-1">&nbsp; <label for="account-option-1">Remember me</label>
                    </div> --}}

                    <div class="row">
                        <div class="form-group pass ml-3 mr-3">
                            <a href="{{ url('/forgot-password') }}" class="psw">Lupa Password?</a>                        
                        </div>
                        <div class="form-group pass ml-4">
                            <a href="/user/register" class="psw">Tidak memiliki akun?</a>
                        </div>
                    </div>
                </form>
            </div>
            <!--End Login Form -->  
        </div>
    </section>
</div>
@endsection
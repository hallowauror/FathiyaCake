@extends('home.layouts.master')

@section('content')
<div class="container">
    <section class="login-section">
        <div class="auto-container">
            <!-- Login Form -->
            <div class="login-form">
                <h2>Daftar</h2>

                @if ( $errors->any() )

                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>

                @endif

                <!--Login Form-->
                <form method="post" action="{{ url('/user/register') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>Nama Panjang</label>
                        <input type="text" name=" name" placeholder="" required>
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" placeholder="" required>
                    </div>
                    
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" placeholder="" required>
                    </div>

                    <div class="form-group">
                        <label>Konfirmasi Password</label>
                        <input type="password" name="password_confirmation" placeholder="" required>
                    </div>

                    <button class="theme-btn" type="submit">Daftar</button>

                    {{-- <div class="form-group">
                        <input type="checkbox" name="shipping-option" id="account-option-1">&nbsp; <label for="account-option-1">Remember me</label>
                    </div> --}}

                    <div class="row mt-3">
                        {{-- <div class="form-group pass">
                            <a href="login.html#" class="psw">Lost your password?</a>                        
                        </div> --}}
                        <div class="form-group pass ml-4">
                            <a href="/user/login" class="psw">Sudah punya akun?</a>
                        </div>
                    </div>
                </form>
            </div>
            <!--End Login Form -->  
        </div>
    </section>
</div>
@endsection

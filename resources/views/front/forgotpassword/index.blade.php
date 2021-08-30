@extends('home.layouts.master')

@section('content')
<div class="container">
    <section class="login-section">
        <div class="auto-container">
            <!-- Login Form -->
            <div class="login-form">
                <h2>Lupa Password</h2>

                @if ( $errors->any() )

                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>

                    @endif

                    @if (session('success'))
                    <div class="alert alert-success alert-dismissible">
                        {!! session('success') !!}
                    </div>
                @endif



                <!--Login Form-->
                <form method="post" action="{{ url('/forgot-password') }}">
                    @csrf
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" placeholder="" required>
                    </div>
                    
                    <div class="form-group">
                        <button class="theme-btn" type="submit">Lupa Password</button>
                    </div>

                    {{-- <div class="form-group">
                        <input type="checkbox" name="shipping-option" id="account-option-1">&nbsp; <label for="account-option-1">Remember me</label>
                    </div> --}}

                    <div class="row">
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
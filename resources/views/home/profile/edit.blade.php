@extends('home.layouts.master')

@section('content')
<div class="container">
    <section class="login-section">
        <div class="auto-container">
            <!-- Login Form -->
            <div class="login-form">
                <h2>Ubah Data Diri</h2>

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
                <form method="post" action="{{ url('/user/profile/update') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>Nama Panjang</label>
                        <input type="text" name=" name" placeholder="" value="{{$user->name}}" required>
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" placeholder="" value="{{$user->email}}" readonly required>
                    </div>
                    
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" placeholder="">
                    </div>

                    <div class="form-group">
                        <label>Konfirmasi Password</label>
                        <input type="password" name="confirm_password" placeholder="">
                    </div>

                    <button class="theme-btn" type="submit">Perbarui</button>

                    {{-- <div class="form-group">
                        <input type="checkbox" name="shipping-option" id="account-option-1">&nbsp; <label for="account-option-1">Remember me</label>
                    </div> --}}

                   
                </form>
            </div>
            <!--End Login Form -->  
        </div>
    </section>
</div>
@endsection

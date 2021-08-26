@extends('home.layouts.master')

@section('content')
<div class="container mb-5" style="margin-top: 10%">
    <div class="row float-center">
    
        <div class="col-md-12" id="register">
    
            <div class="card col-md-8">
                <div class="card-body">
    
                    <h2 class="card-title">Kritik & Saran</h2>
                    <hr>
    
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
    
                    <form method="post" action="{{url('suggestion')}}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="email">Email anda:</label>
                            <input type="text" name="email" placeholder="Email" id="email" class="form-control">
                        </div>
    
                        <div class="form-group">
                            <label for="pesan">Pesan anda:</label>
                            <textarea name="pesan" placeholder="Pesan" id="pesan"
                                   class="form-control"></textarea>
                        </div>
    
                        <div class="form-group">
                            <button class="btn btn-outline-info col-md-2 float-right"> Kirim</button>
                        </div>
    
                    </form>
    
                </div>
            </div>
    
    
        </div>
    
    </div>
</div>
@endsection
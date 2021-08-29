@extends('admin.layouts.master')

@section('page')
Ubah Produk
@endsection

@section('content')
{{-- 
    <div class="row">
        <div class="col-lg-10 col-md-10">
            @include('admin.layouts.message')
            <div class="card">
                <div class="header">
                    <h4 class="title">Produk</h4>
                </div>

                <div class="content">
                    {!! Form::open(['url' => ['admin/products', $product->id], 'files'=>'true', 'method'=>'put']) !!}
                    <div class="row">
                        <div class="col-md-12">

                            @include('admin.products._fields')

                            <div class="form-group">
                                {{ Form::submit('Ubah Product', ['class'=>'btn btn-primary']) }}
</div>

</div>

</div>


<div class="clearfix"></div>
{!! Form::close() !!}
</div>
</div>
</div>
</div> --}}


<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <!-- users edit start -->
            <section class="app-user-edit">
                <div class="card">
                    <div class="card-body">

                        <div class="tab-content">
                    {!! Form::open(['url' => ['admin/products', $product->id], 'files'=>'true', 'method'=>'put']) !!}
                                                            
                                {{ csrf_field() }}
                                <!-- Account Tab starts -->
                                <div class="tab-pane active" id="account" aria-labelledby="account-tab" role="tabpanel">
                                    <!-- users edit start -->
                                    <div class="d-flex mb-2">
                                        <img src="{{ url('uploads').'/'. $product->image }}" alt="users avatar"
                                            class="user-avatar users-avatar-shadow rounded me-2 my-25 cursor-pointer"
                                            height="90" width="90" />
                                        <div class="mt-50">
                                            <h4>{{ $product->name }}</h4>
                                            <div class="col-12 d-flex mt-1 px-0">
                                                <label class="btn btn-primary me-75 mb-0" for="change-picture">
                                                    <span class="d-none d-sm-block">Change</span>
                                                    <input class="form-control" type="file" id="change-picture" hidden
                                                        accept="image/png, image/jpeg, image/jpg" name="image" />
                                                    <span class="d-block d-sm-none">
                                                        <i class="me-0" data-feather="edit"></i>
                                                    </span>
                                                </label>
                                                <button class="btn btn-outline-secondary d-block d-sm-none">
                                                    <i class="me-0" data-feather="trash-2"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- users edit ends -->
                                    <!-- users edit account form start -->
                                    <div class="col-md-4">
                                        <div class="mb-1">
                                            <label class="form-label" for="username">Nama Produk</label>
                                            <input type="text" class="form-control" placeholder="Username"
                                                value="{{ $product->name }}" name="name" id="username" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-1">
                                            <label class="form-label" for="name">Harga Produk</label>
                                            <input type="text" class="form-control" placeholder="Name"
                                                value="{{ $product->price }}" name="price" id="name" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-1">
                                            <label class="form-label" for="email">Stock</label>
                                            <input type="number" class="form-control" placeholder="Email"
                                                value="{{ $product->stock }}" name="stock" id="email" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-1">
                                            <label class="form-label" for="email">Status</label>
                                        <select class="form-control" name="status">
                                            <option value disabled="{{$product->status}}">{{$product->status}}</option>
                                            <option value="Ready">Ready</option>
                                            <option value="PO">Pre-Order</option>
                                        </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-1">
                                            <label class="form-label" for="email">Kategori</label>
                                        <select class="form-control" name="category_id">
                                            @php
                                                $categories = App\Category::get();
                                            @endphp
                                            @foreach($categories as $item)
                                            <option value="{{$item->id}}">{{$item->category_name}}</option>
                                        @endforeach
                                        </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-1">
                                            <label class="form-label" for="email">Deskripsi</label>
                                            <textarea type="text" class="form-control" placeholder="Email"
                                                name="description" id="email">{{ $product->description }}</textarea>
                                        </div>
                                    </div>

                                    <div class="col-12 d-flex flex-sm-row flex-column mt-2">
                                        {{ Form::submit('Save Changes', ['class'=>'btn btn-primary']) }}

                                    </div>
{!! Form::close() !!}
                            
                            <!-- users edit account form ends -->
                        </div>
                        <!-- Account Tab ends -->
                    </div>
                </div>
        </div>
        </section>
        <!-- users edit ends -->

    </div>
</div>
</div>

@endsection
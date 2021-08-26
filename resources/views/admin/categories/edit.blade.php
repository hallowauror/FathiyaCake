@extends('admin.layouts.master')

@section('page')
Ubah Kategori
@endsection

@section('content')

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
                    {!! Form::open(['url' => ['admin/categories/update', $category->id], 'files'=>'true', 'method'=>'post']) !!}
                                                            
                                {{ csrf_field() }}
                                <!-- Account Tab starts -->
                                <div class="tab-pane active" id="account" aria-labelledby="account-tab" role="tabpanel">
                                    <!-- users edit start -->
                                    <!-- users edit account form start -->
                                    <div class="col-md-4">
                                        <div class="mb-1">
                                            <label class="form-label" for="username">Nama Kategori</label>
                                            <input type="text" class="form-control" value="{{ $category->category_name }}" name="category_name" />
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
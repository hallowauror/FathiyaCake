@extends('admin.layouts.master')

@section('page')
Dashboard
@endsection

@section('content')
<!-- BEGIN: Body-->
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- Dashboard Ecommerce Starts -->
                <section id="dashboard-ecommerce">
                    <div class="row match-height">
                        <div class="col-lg-12 col-12">
                            <div class="row match-height">
                                <!-- Bar Chart - Orders -->
                                <div class="col-lg-6 col-md-3 col-6">
                                    <div class="card">
                                        <div class="card-body pb-50">
                                            <h6>Jumlah Order</h6>
                                            <h2 class="fw-bolder mb-1">{{$order}}</h2>
                                        </div>
                                    </div>
                                </div>
                                <!--/ Bar Chart - Orders -->

                                <!-- Line Chart - Profit -->
                                <div class="col-lg-6 col-md-3 col-6">
                                    <div class="card card-tiny-line-stats">
                                        <div class="card-body pb-50">
                                            <h6>User Terdaftar</h6>
                                            <h2 class="fw-bolder mb-1">{{$user}}</h2>
                                        </div>
                                    </div>
                                </div>
                                <!--/ Line Chart - Profit -->
                                <div class="col-lg-6 col-md-3 col-6">
                                    <div class="card card-tiny-line-stats">
                                        <div class="card-body pb-50">
                                            <h6>Jumlah Produk</h6>
                                            <h2 class="fw-bolder mb-1">{{$product}}</h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-3 col-6">
                                    <div class="card">
                                        <div class="card-body pb-50">
                                            <h6>Jumlah Pendapatan</h6>
                                            <h2 class="fw-bolder mb-1">{{$income}}</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

        </div>
        <!-- End: Customizer-->

    </div>
    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>
@endsection
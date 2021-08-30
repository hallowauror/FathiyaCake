@extends('home.layouts.master')

@section('content')

<!-- Content Elements -->
<section class="content-elements" id="page">
    <div class="auto-container">

        <!-- Sec title -->
        <div class="sec-title text-center margin-top-50">
            <div class="divider"><img src="images/icons/divider_1.png" alt=""></div>
            <h2>Data Pengguna</h2>
        </div>

        <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12 margin-bottom-50">
                <div class="default-tabs tabs-box">
                    <!--Tabs Box-->
                    <ul class="tab-buttons clearfix">
                        <li class="tab-btn active-btn" data-tab="#tab1">Pesanan Dikerjakan</li>
                        <li class="tab-btn" data-tab="#tab2">Pesanan Berhasil</li>
                    </ul>

                    <div class="tabs-content">
                        <!--Tab-->
                        <div class="tab active-tab" id="tab1">

                            <ul class="list-style-one">
                                @foreach ($orders_unsuccess as $order)
                                <li>
                                    <div class="row">
                                        <div class="col-10">
                                            ID : #{{ $order->id }}-{{ date(strtotime($order->date)) }}-{{ $order->user_id }} <br>
                                            Status : 
                                            @if ($order->status == 'Confirmed')
                                            <span class="badge badge-info">Confirmed</span>
                                            @elseif ($order->status == 'Pending')
                                            <span class="badge badge-warning">Pending</span>
                                            @elseif ($order->status == 'Verifying')
                                            <span class="badge badge-warning">Verifying</span>
                                            @elseif ($order->status == 'Finished')
                                            <span class="badge badge-success">Finished</span>
                                            @endif <br>
                                            @if ($order->status == 'Confirmed' && $order->payment_method == 'transfer')
                                                <span style="color: red">Harap lakukan pembayaran sebelum {{ date('F jS, Y', strtotime($order->due_date)) }}</span>                                    
                                            @endif
                                            @if ($order->send_by == 'by_self' && $order->take_time != null)
                                                <span style="color: green">Harap mengambil pesanan di toko pada {{ date('F jS, Y', strtotime($order->take_time)) }} </span>
                                            @elseif ($order->send_by == 'by_courir')
                                                <span style="color: green">Pesananmu sedang diantar oleh kurir </span>
                                            @endif
                                        </div>
                                        <div class="col-2 float-center">
                                            <a href="{{ url('/user/order' . '/' . $order->id) }}">
                                                Track
                                            </a>
                                        </div>
                                    </div>

                                </li>
                                @endforeach
                            </ul>
                        </div>

                        <!--Tab-->
                        <div class="tab" id="tab2">

                            <ul class="list-style-one">
                                @foreach ($orders_success as $order)
                                <li>
                                    <div class="row">
                                        <div class="col-10">
                                            ID : #{{ $order->id }}-{{ date(strtotime($order->date)) }}-{{ $order->user_id }} <br>
                                            Status : <span class="badge badge-success">Success</span> <br>
                                            Date : {{ date('F jS, Y', strtotime($order->date)) }}
                                            
                                        </div>
                                        <div class="col-2 float-center">
                                            <a href="{{ url('/user/order' . '/' . $order->id) }}">
                                                Detail
                                            </a>
                                        </div>
                                    </div>

                                </li>
                                @endforeach
                            </ul>
                        </div>
                       
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-12 col-sm-12 margin-bottom-50">
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

                @if (session('error'))
                    <div class="alert alert-error alert-dismissible">
                        {!! session('error') !!}
                    </div>
                @endif
                <!--Accordian Box-->
                <ul class="accordion-box">
                    <!--Block-->
                    <li class="accordion block active-block">
                        <div class="acc-btn active">
                            <div class="icon-outer"><span class="icon fa fa-plus"></span> </div> Nama
                        </div>
                        <div class="acc-content current">
                            <div class="content">
                                <div class="text">{{ Auth::user()->name }}</div>
                            </div>
                        </div>
                    </li>

                    <!--Block-->
                    <li class="accordion block active-block">
                        <div class="acc-btn active">
                            <div class="icon-outer"><span class="icon fa fa-plus"></span> </div> Email
                        </div>
                        <div class="acc-content current">
                            <div class="content">
                                <div class="text">{{ Auth::user()->email }}</div>
                            </div>
                        </div>
                    </li>
                </ul>
                
                <a href="/user/logout" class="theme-btn float-right mt-4 ml-4">Logout</a>
                <a href="/user/profile/update" class="theme-btn float-right mt-4 mr-4">Perbarui Data Pengguna</a>
            </div>
        </div>

    </div>
</section>
<!--End Content Elements -->



@endsection
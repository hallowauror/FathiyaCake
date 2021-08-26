@extends('home.layouts.master')

@section('content')

<!-- Content Elements -->
<section class="content-elements" id="page">
    <div class="auto-container">

        <!-- Sec title -->
        <div class="sec-title text-center margin-top-50">
            <div class="divider"><img src="images/icons/divider_1.png" alt=""></div>
            <h2>User Profile</h2>
        </div>

        <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12 margin-bottom-50">
                <div class="default-tabs tabs-box">
                    <!--Tabs Box-->
                    <ul class="tab-buttons clearfix">
                        <li class="tab-btn active-btn" data-tab="#tab1">Order on Process</li>
                        <li class="tab-btn" data-tab="#tab2">Order Success</li>
                    </ul>

                    <div class="tabs-content">
                        <!--Tab-->
                        <div class="tab active-tab" id="tab1">

                            <ul class="list-style-one">
                                @foreach ($orders_unsuccess as $order)
                                <li>
                                    <div class="row">
                                        <div class="col-10">
                                            ID : #1-{{ date(strtotime($order->date)) }}-{{ $order->user_id }} <br>
                                            <span style="color: red">Harap lakukan pembayaran sebelum {{ date('F jS, Y', strtotime($order->payment)) }}</span>
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
                                <li>Leo, ornare at posuere in, malesuadaaliquet tempus odio.</li>
                                <li>Sollicitudin quam, vitae tempor facilisi aliquet tempus.</li>
                                <li>Lacinia, sodales pellentesque aliquet tempus odio.</li>
                                <li>Donec ligula leo, ornare at posuere in, tempus odio.</li>
                            </ul>
                        </div>

                        <!--Tab-->
                        <div class="tab" id="tab3">
                            <p>Quisque dolor lacus, lobortis a urna non, iaculis ornare nunc. Maecenas rutrum vel augue
                                id ornare. Mauris a justo interdum, ultricies mi ac, condimentum odio.</p>
                            <ul class="list-style-one">
                                <li>Leo, ornare at posuere in, malesuadaaliquet tempus odio.</li>
                                <li>Sollicitudin quam, vitae tempor facilisi aliquet tempus.</li>
                                <li>Lacinia, sodales pellentesque aliquet tempus odio.</li>
                                <li>Donec ligula leo, ornare at posuere in, tempus odio.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-12 col-sm-12 margin-bottom-50">
                <!--Accordian Box-->
                <ul class="accordion-box">
                    <!--Block-->
                    <li class="accordion block active-block">
                        <div class="acc-btn active">
                            <div class="icon-outer"><span class="icon fa fa-plus"></span> </div> Name
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


                <a href="/user/logout" class="theme-btn float-right mt-4">Logout</a>
            </div>
        </div>

    </div>
</section>
<!--End Content Elements -->



@endsection
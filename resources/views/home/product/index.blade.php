@extends('home.layouts.master')

@section('content')
    <!--Sidebar Page Container-->
    <div class="sidebar-page-container mt-5">
        <div class="auto-container">
            <div class="row clearfix">

                <!--Content Side-->
                <div class="content-side col-lg-9 col-md-12 col-sm-12">
                    <div class="shop-single">
                        <!-- Product Detail -->
                        <div class="product-details">
                            <!--Basic Details-->
                            <div class="basic-details">
                                <div class="row clearfix">
                                    <div class="image-column col-md-6 col-sm-12">
                                        <figure class="image"><img src="{{ url('/uploads') . '/' . $product->image }}"
                                                alt=""><span class="icon fa fa-search"></span></a></figure>
                                    </div>
                                    <div class="info-column col-md-6 col-sm-12">
                                        <div class="details-header">
                                            <h4>{{ $product->name }}</h4>
                                            <p>{{$product->category_name}}</p>
                                            <div class="item-price">Rp. {{ number_format($product->price, 0, ',', '.') }}
                                            </div>
                                            <div class="text">{{ $product->description }}.</div>
                                        </div>

                                        <div class="other-options clearfix">
                                            <form action="{{ route('cart') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $product->id }}">
                                                <input type="hidden" name="name" value="{{ $product->name }}">
                                                <input type="hidden" name="price" value="{{ $product->price }}">
                                                <button type="submit" class="theme-btn add-to-cart"><i
                                                        class="fa fa-cart-plus "></i> Tambahkan ke Keranjang </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Basic Details-->


                        </div><!-- Product Detail -->
                    </div><!-- End Shop Single -->
                </div>

                <!--Sidebar Side-->
                <div class="sidebar-side sticky-container col-lg-3 col-md-12 col-sm-12">
                    <aside class="sidebar theiaStickySidebar">
                        <div class="sticky-sidebar">
                            <!-- Search Widget -->
                            <div class="sidebar-widget search-widget">
                                <form method="post" action="contact.html">
                                    <div class="form-group">
                                        <input type="search" name="search-field" value="" placeholder="Cari Produk…"
                                            required>
                                        <button type="submit"><span class="icon fa fa-search"></span></button>
                                    </div>
                                </form>
                            </div>

                            <!-- Cart Widget -->
                            <div class="sidebar-widget cart-widget">
                                <div class="widget-content">
                                    <h3 class="widget-title">Keranjang</h3>
                                    
                                    <div class="shopping-cart">
                                        <ul class="shopping-cart-items">
                                            @foreach (Cart::instance('default')->content() as $item )
                                            <li class="cart-item">
                                                <img src="{{ url('/uploads') . '/'. $item->model->image }}" alt="#" class="thumb" />
                                                <span class="item-name">{{ $item->model->name }}</span>
                                                @php
                                                    $total = "Rp " . $item->total();
                                                @endphp
                                                <span class="item-quantity">{{ $item->qty }} x <span class="item-amount">{{$total}}</span></span>
                                                <a href="{{ url('/product' . '/' . $product->id) }}" class="product-detail"></a>
                                                <form action="{{ route('cart.destroy', $item->rowId) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="remove-item"><span class="fa fa-times"></span></button>
                                                </form>
                                            </li>
                                            @endforeach
                                        </ul>

                                        <div class="cart-footer">
                                            @php     
                                                $subtotal = Cart::subtotal();
                                                $tax = Cart::tax();
                                                $total = Cart::total();
                                            @endphp
                                            <div class="shopping-cart-total"><strong>Subtotal : </strong>Rp. {{$subtotal}}</div>
                                            <a href="{{ url('/cart') }}" class="theme-btn">Keranjang</a>
                                            <a href="{{url('/checkout')}}" class="theme-btn">Beli</a>
                                        </div>
                                    </div> <!--end shopping-cart -->
                                </div>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>

            <!-- Related Products -->
            <div class="related-products">
                <div class="sec-title">
                    <h4>Produk Terkait</h4>
                </div>

                <div class="row clearfix">

                    @foreach ($products as $item)
                        <!-- Shop Item --> 
                        <div class="shop-item col-lg-4 col-md-6 col-sm-12">
                            <div class="inner-box">
                                <div class="image-box">                                    
                                    <figure class="image"><a href="{{ url('/product' . '/' . $product->id) }}"><img src="{{ url('/uploads') . '/' . $item->image }}" style="height: 220px;"></a></figure>
                                    <div class="btn-box">
                                        <form action="{{ route('cart') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $item->id }}">
                                            <input type="hidden" name="name" value="{{ $item->name }}">
                                            <input type="hidden" name="price" value="{{ $item->price }}">
                                        <button type="submit" class="btn btn-warning btn-outline-dark"><i class="fa fa-cart-plus "></i> Tambahkan ke Keranjang </button>
                                        </form>
                                    </div>
                                </div>
                                <div class="lower-content">
                                    <h4 class="name"><a href="{{ url('/product' . '/' . $item->id) }}">{{ $item->name }}</a></h4>        
                                    <p>{{$product->category_name}}</p>
                                    <div class="price mt-2">Rp. {{ number_format($item->price, 0, ',', '.') }}</div>
                                </div>
                            </div>
                        </div>                        
                    @endforeach
                   
                </div>
            </div><!-- End Related Products -->

        </div>

        
    </div>
    <!--End Sidebar Page Container-->

                                

@endsection

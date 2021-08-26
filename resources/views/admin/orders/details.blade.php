@extends('admin.layouts.master')

@section('page')
Detail order
@endsection


@section('content')

<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <!-- users list start -->
            <section class="app-user-list">
                <!-- users filter start -->

                <!-- users filter end -->
                <!-- list section start -->
                <div class="card">
                    <div class="card-datatable table-responsive pt-0">
                        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                            <div
                                class="d-flex justify-content-between align-items-center header-actions mx-1 row mt-75">
                                <div class="col-sm-12 col-md-4 col-lg-6">

                                </div>
                            </div>
                            <table class="user-list-table table dataTable no-footer dtr-column" id="DataTables_Table_0"
                                role="grid" aria-describedby="DataTables_Table_0_info">
                                <thead class="table-light">
                                    <tr role="row">
                                        <th class="control sorting_disabled" rowspan="1" colspan="1"
                                            style="width: 23.6px; display: none;" aria-label=""></th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                            colspan="1" style="width: 84.6125px;"
                                            aria-label="User: activate to sort column ascending">
                                            ID
                                        </th>
                                        <th class="sorting sorting_desc" tabindex="0" aria-controls="DataTables_Table_0"
                                            rowspan="1" colspan="1" style="width: 94.25px;" aria-sort="descending"
                                            aria-label="Email: activate to sort column ascending">
                                            Tanggal
                                        </th>
                                        <th class="sorting sorting_desc" tabindex="0" aria-controls="DataTables_Table_0"
                                            rowspan="1" colspan="1" style="width: 94.25px;" aria-sort="descending"
                                            aria-label="Email: activate to sort column ascending">
                                            Alamat
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                            colspan="1" style="width: 85.0375px;"
                                            aria-label="Role: activate to sort column ascending">
                                            Status
                                        </th>
                                        <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 116.425px;"
                                            aria-label="Actions">
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr class="odd">
                                        <td valign="top" class="dataTables_empty">{{ $order->id }}</td>
                                        <td valign="top" class="dataTables_empty">{{ $order->date }}</td>
                                        <td valign="top" class="dataTables_empty">{{ $order->address }}</td>

                                        <td valign="top" class="dataTables_empty">
                                            @if ($order->status == 'Confirmed')
                                            <span class="label label-info">Confirmed</span>
                                            @elseif ($order->status == 'Pending')
                                            <span class="label label-warning">Pending</span>
                                            @elseif ($order->status == 'Verifying')
                                            <span class="label label-warning">Verifying</span>
                                            @elseif ($order->status == 'Sending')
                                            <span class="label label-success">Sending</span>
                                            @elseif ($order->status == 'Finished')
                                            <span class="label label-success">Finished, wait for taken</span>
                                            @elseif ($order->status == 'Success')
                                            <span class="label label-success">Complete Transaction</span>
                                            @else
                                            <span class="label label-success">Processed</span>
                                            @endif
                                        </td>

                                        <td valign="top" class="dataTables_empty">
                                            @if ($order->status == 'Confirmed')
                                            {{ link_to_route('order.pending','Pending', $order->id, ['class'=>'btn btn-success btn-sm']) }}
                                            @elseif ($order->status == 'Verifying')
                                            {{ link_to_route('order.process','Proceed', $order->id, ['class'=>'btn btn-success btn-sm']) }}
                                            @elseif ($order->status == 'Pending')
                                            {{ link_to_route('order.confirm','Confirm', $order->id, ['class'=>'btn btn-info btn-sm']) }}
                                            @elseif($order->status == 'Success')

                                            @elseif($order->status == 'Finished' || $order->status != 'Sending' )
                                            {{ link_to_route('order.success','Success', $order->id, ['class'=>'btn btn-info btn-sm']) }}
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-between mx-2 row mb-1">
                                <div class="col-sm-12 col-md-6">
                                    <div class="dataTables_paginate paging_simple_numbers"
                                        id="DataTables_Table_0_paginate">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- list section end -->
            </section>
            <!-- users list ends -->
        </div>

        <div class="row">
            <div class="content-body col-6">
                <!-- users list start -->
                <section class="app-user-list">
                    <!-- users filter start -->

                    <!-- users filter end -->
                    <!-- list section start -->
                    <div class="card">
                        <div class="card-datatable table-responsive pt-0">
                            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                                <div
                                    class="d-flex justify-content-between align-items-center header-actions mx-1 row mt-75">
                                    <div class="col-sm-12 col-md-4 col-lg-6">

                                    </div>
                                </div>
                                <table class="user-list-table table dataTable no-footer dtr-column"
                                    id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                                    <thead class="table-light">
                                        <tr role="row">
                                            <th colspan="2" class="text-center">Detail User</th>
                                        </tr>
                                        <tr role="row">
                                            <th class="control sorting_disabled" rowspan="1" colspan="1"
                                                style="width: 23.6px; display: none;" aria-label=""></th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                rowspan="1" colspan="1" style="width: 84.6125px;"
                                                aria-label="User: activate to sort column ascending">
                                                ID
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                rowspan="1" colspan="1" style="width: 84.6125px;"
                                                aria-label="User: activate to sort column ascending">
                                                {{ $order->user->id }}
                                            </th>
                                        </tr>
                                        <tr role="row">
                                            <th class="control sorting_disabled" rowspan="1" colspan="1"
                                                style="width: 23.6px; display: none;" aria-label=""></th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                rowspan="1" colspan="1" style="width: 84.6125px;"
                                                aria-label="User: activate to sort column ascending">
                                                Nama
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                rowspan="1" colspan="1" style="width: 84.6125px;"
                                                aria-label="User: activate to sort column ascending">
                                                {{ $order->user->name }}
                                            </th>
                                        </tr>
                                        <tr role="row">
                                            <th class="control sorting_disabled" rowspan="1" colspan="1"
                                                style="width: 23.6px; display: none;" aria-label=""></th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                rowspan="1" colspan="1" style="width: 84.6125px;"
                                                aria-label="User: activate to sort column ascending">
                                                Email
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                rowspan="1" colspan="1" style="width: 84.6125px;"
                                                aria-label="User: activate to sort column ascending">
                                                {{ $order->user->email }}
                                            </th>
                                        </tr>
                                        <tr role="row">
                                            <th class="control sorting_disabled" rowspan="1" colspan="1"
                                                style="width: 23.6px; display: none;" aria-label=""></th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                rowspan="1" colspan="1" style="width: 84.6125px;"
                                                aria-label="User: activate to sort column ascending">
                                                Pengiriman
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                rowspan="1" colspan="1" style="width: 84.6125px;"
                                                aria-label="User: activate to sort column ascending">
                                                {{ $order->address }} <br>
                                                {{ $order->city }}, {{ $order->postal }}
                                            </th>
                                        </tr>

                                       
                                    </thead>
                                </table>
                            </div>
                        </div>

                    </div>
                    <!-- list section end -->
                </section>
                <!-- users list ends -->
            </div>

            
            <div class="content-body col-6">
                <!-- users list start -->
                <section class="app-user-list">
                    <!-- users filter start -->

                    <!-- users filter end -->
                    <!-- list section start -->

                    @if ($order->status == 'Verifying' || $order->send_by != null)
                        <div class="card">
                            <div class="card-datatable table-responsive pt-0">
                                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                                    <div
                                        class="d-flex justify-content-between align-items-center header-actions mx-1 row mt-75">
                                        <div class="col-sm-12 col-md-4 col-lg-6">

                                        </div>
                                    </div>
                                    <form action="{{ url('/admin/done' . '/' . $order->id) }}" method="post">
                                        {{ csrf_field() }}
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Pengiriman pesanan</th>
                                                    <th>
                                                        @if ($order->send_by == 'by_self')
                                                            Diambil ke toko     
                                                        @else
                                                            Dikirim dengan kurir                                                   
                                                        @endif
                                                    </th>
                                                </tr>
                                                @if ($order->status == 'Processed' && $order->send_by == 'by_self')
                                                <tr>
                                                    <th>Waktu Pengambilan</th>
                                                    <th>
                                                        <div class="form-group">
                                                            <input type="date" name="time" id="datetime"
                                                                class="form-control">
                                                        </div>
                                                    </th>
                                                </tr>
                                                @endif

                                            </thead>
                                        </table>
                                        @if ($order->send_by == 'courir' && $order->status == 'Processed')
                                        <input type="hidden" name="status" value="Sending">
                                            <div class="text-center my-2">
                                                <button type="submit" class="btn btn-success">Kirim</button>
                                            </div>
                                        @elseif ($order->status == 'Processed')
                                        <div class="text-center my-2">
                                            <button type="submit" class="btn btn-success">Tetapkan waktu</button>                                            
                                        </div>
                                        @endif

                                    </form>
                                </div>
                            </div>

                        </div>                        
                    @endif



                    <!-- list section end -->
                </section>
                <!-- users list ends -->
            </div>
            

        </div>

        <div class="content-body">
            <!-- users list start -->
            <section class="app-user-list">
                <!-- users filter start -->

                <!-- users filter end -->
                <!-- list section start -->
                <div class="card">
                    <div class="card-datatable table-responsive pt-0">
                        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                            <div
                                class="d-flex justify-content-between align-items-center header-actions mx-1 row mt-75">
                                <div class="col-sm-12 col-md-4 col-lg-6">

                                </div>
                            </div>
                            <table class="user-list-table table dataTable no-footer dtr-column" id="DataTables_Table_0"
                                role="grid" aria-describedby="DataTables_Table_0_info">
                                <thead class="table-light">
                                    <tr role="row">
                                        <th class="control sorting_disabled" rowspan="1" colspan="1"
                                            style="width: 23.6px; display: none;" aria-label=""></th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                            colspan="1" style="width: 84.6125px;"
                                            aria-label="User: activate to sort column ascending">
                                            ID Order
                                        </th>
                                        <th class="sorting sorting_desc" tabindex="0" aria-controls="DataTables_Table_0"
                                            rowspan="1" colspan="1" style="width: 94.25px;" aria-sort="descending"
                                            aria-label="Email: activate to sort column ascending">
                                            Nama Produk
                                        </th>
                                        <th class="sorting sorting_desc" tabindex="0" aria-controls="DataTables_Table_0"
                                            rowspan="1" colspan="1" style="width: 94.25px;" aria-sort="descending"
                                            aria-label="Email: activate to sort column ascending">
                                            Harga
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                            colspan="1" style="width: 85.0375px;"
                                            aria-label="Role: activate to sort column ascending">
                                            Quantity
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                            colspan="1" style="width: 85.0375px;"
                                            aria-label="Role: activate to sort column ascending">
                                            Gambar
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                            colspan="1" style="width: 85.0375px;"
                                            aria-label="Role: activate to sort column ascending">
                                            Status
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="odd">
                                        <td valign="top" class="dataTables_empty">{{ $order->id }}</td>
                                        <td valign="top" class="dataTables_empty">
                                            @foreach ($order->products as $product)
                                            <table class="table">
                                                <tr>
                                                    <td>{{ $product->name }}</td>
                                                </tr>
                                            </table>
                                            @endforeach
                                        </td>
                                        <td valign="top" class="dataTables_empty">
                                            @foreach ($order->orderItems as $item)
                                            <table class="table">
                                                <tr>
                                                    <td>{{ $item->price }}</td>
                                                </tr>
                                            </table>
                                            @endforeach
                                        </td>

                                        <td valign="top" class="dataTables_empty">
                                            @foreach ($order->orderItems as $item)
                                            <table class="table">
                                                <tr>
                                                    <td>{{ $item->quantity }}</td>
                                                </tr>
                                            </table>
                                            @endforeach
                                        </td>

                                        <td valign="top" class="dataTables_empty">
                                            @foreach ($order->products as $product)
                                            <table class="table">
                                                <tr>
                                                    <td><img src="{{ url('uploads') . '/' . $product->image }}" alt=""
                                                            style="width: 5em">
                                                    </td>
                                                </tr>
                                            </table>
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach ($order->products as $key => $product)
                                            <table class="table">
                                                <tr>
                                                    @if ($product->stock <= 0) <td>
                                                        <button class="btn btn-danger btn-sm">Out of stock</button>
                                        </td>
                                        @else
                                        <td>
                                            <button class="btn btn-success btn-sm">Available
                                                {{ $order->OrderItems[$key]->quantity }} /
                                                {{ $product->stock }}</button>
                                        </td>
                                        @endif
                                    </tr>
                            </table>
                            @endforeach
                            </td>
                            </tr>
                            </tbody>
                            <thead class="table-light">
                                <tr role="row">
                                    <th colspan="6">*Notes : {{ $order->information }} </th>
                                </tr>
                            </thead>
                            </table>
                            <div class="d-flex justify-content-between mx-2 row mb-1">
                                <div class="col-sm-12 col-md-6">
                                    <div class="dataTables_paginate paging_simple_numbers"
                                        id="DataTables_Table_0_paginate">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- list section end -->
            </section>
            <!-- users list ends -->
        </div>
    </div>
</div>



@endsection
@extends('admin.layouts.master')

@section('page')
Order
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
                <h1>Order List</h1>
                <!-- users filter end -->
                <!-- list section start -->
                <div class="card">
                    <div class="card-datatable table-responsive pt-0">
                        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">                            
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
                                            User
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                            colspan="1" style="width: 85.0375px;"
                                            aria-label="Role: activate to sort column ascending">
                                            Produk
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                            colspan="1" style="width: 85.725px;"
                                            aria-label="Plan: activate to sort column ascending">
                                            Quantity
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                            colspan="1" style="width: 106.55px;"
                                            aria-label="Status: activate to sort column ascending">
                                            Status
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                            colspan="1" style="width: 106.55px;"
                                            aria-label="Status: activate to sort column ascending">
                                            Pembayaran
                                        </th>
                                        <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 116.425px;"
                                            aria-label="Actions">
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)

                                    <tr class="odd">
                                        <td valign="top" class="dataTables_empty">{{ $order->id }}</td>
                                        <td valign="top" class="dataTables_empty">{{ $order->user->name }}</td>
                                        <td valign="top" class="dataTables_empty">
                                            @foreach ($order->products as $item)
                                            <table class="table">
                                                <tr>
                                                    <td>{{ $item->name }}</td>
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
                                            @if ($order->status == 'Confirmed')
                                            <span class="label label-info">Confirmed</span>
                                            @elseif ($order->status == 'Pending')
                                            <span class="label label-warning">Pending</span>
                                            @elseif ($order->status == 'Verifying')
                                            <span class="label label-warning">Verifying</span>
                                            @elseif ($order->status == 'Finished')
                                            <span class="label label-success">Finished, wait for taken</span>
                                            @elseif ($order->status == 'Sending')
                                            <span class="label label-success">Sending</span>
                                            @elseif ($order->status == 'Success')
                                            <span class="label label-success">Compled Transaction</span>
                                            @else
                                            <span class="label label-success">Processed</span>
                                            @endif
                                        </td>

                                        @if($order->payment == NULL && $order->payment_method == 'transfer')
                                        <td>Belum Ada Pembayaran</td>
                                        @elseif ($order->payment_method == 'cod')
                                            <td>COD</td>
                                        @else
                                        <td><a href="{{asset('uploads')}}/{{$order->payment}}" target="_blank">Lihat
                                        </td>
                                        @endif
                                                                                

                                        <td valign="top" class="dataTables_empty">
                                            @if ($order->status == 'Confirmed')
                                            {{ link_to_route('order.pending','Pending', $order->id, ['class'=>'btn btn-success btn-sm']) }}
                                            @elseif ($order->status == 'Verifying')
                                            {{ link_to_route('order.process','Proceed', $order->id, ['class'=>'btn btn-success btn-sm']) }}
                                            @elseif ($order->status == 'Pending')
                                            {{ link_to_route('order.confirm','Confirm', $order->id, ['class'=>'btn btn-info btn-sm']) }}
                                            @elseif($order->status == 'Finished')
                                            <form action="{{ url('/admin/success') . '/' . $order->id }}" method="post">
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-info btn-sm">Success</button>
                                            </form>
                                            @endif

                                            {{ link_to_route('orders.show','Details', $order->id, ['class'=>'btn btn-default btn-sm']) }}
                                        </td>
                                    </tr>
                                    @endforeach
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


                    <!-- Modal to add new product starts-->
                    <div class="modal modal-slide-in new-user-modal fade" id="modals-slide-in">
                        <div class="modal-dialog">
                            <form action="/admin/products" method="post" class="add-new-user modal-content pt-0"
                                novalidate="novalidate" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close">×</button>
                                <div class="modal-header mb-1">
                                    <h5 class="modal-title" id="exampleModalLabel">New Product</h5>
                                </div>
                                <div class="modal-body flex-grow-1">
                                    <div class="mb-1">
                                        <label class="form-label" for="basic-icon-default-fullname">Nama Produk</label>
                                        <input type="text" class="form-control dt-full-name"
                                            id="basic-icon-default-fullname" name="name" aria-label="John Doe"
                                            aria-describedby="basic-icon-default-fullname2">
                                    </div>
                                    <div class="mb-1">
                                        <label class="form-label" for="basic-icon-default-fullname">Harga Produk</label>
                                        <input type="text" class="form-control dt-full-name"
                                            id="basic-icon-default-fullname" name="price" aria-label="John Doe"
                                            aria-describedby="basic-icon-default-fullname2">
                                    </div>
                                    <div class="mb-1">
                                        <label class="form-label" for="basic-icon-default-fullname">Stock Produk</label>
                                        <input type="text" class="form-control dt-full-name"
                                            id="basic-icon-default-fullname" name="stock" aria-label="John Doe"
                                            aria-describedby="basic-icon-default-fullname2">
                                    </div>
                                    <div class="mb-1">
                                        <label class="form-label" for="basic-icon-default-fullname">Deskripsi
                                            Produk</label>
                                        <textarea type="text" class="form-control dt-full-name"
                                            id="basic-icon-default-fullname" name="description" aria-label="John Doe"
                                            aria-describedby="basic-icon-default-fullname2"></textarea>
                                    </div>
                                    <div class="mb-1">
                                        <label class="form-label" for="basic-icon-default-fullname">Foto Produk</label>
                                        <input type="file" class="form-control dt-full-name"
                                            id="basic-icon-default-fullname" name="image" aria-label="John Doe"
                                            aria-describedby="basic-icon-default-fullname2">
                                    </div>

                                    <button type="submit"
                                        class="btn btn-primary me-1 data-submit waves-effect waves-float waves-light">Submit</button>
                                    <button type="reset" class="btn btn-outline-secondary waves-effect"
                                        data-bs-dismiss="modal">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Modal to add new product Ends-->

                </div>
                <!-- list section end -->
            </section>
            <!-- users list ends -->

        </div>
    </div>
</div>
@endsection
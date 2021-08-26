@extends('admin.layouts.master')

@section('page')
Lihat Kritik dan Saran
@endsection

@section('content')

<div class="app-content content ">
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
              <div class="d-flex justify-content-between align-items-center header-actions mx-1 row mt-75">
                <div class="col-sm-12 col-md-4 col-lg-6">

                </div>
                <div class="col-sm-12 col-md-8 col-lg-6 ps-xl-75 ps-0">
                  <div
                    class="dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center justify-content-md-end align-items-center flex-sm-nowrap flex-wrap me-1">
                    <div class="dt-buttons btn-group flex-wrap"></div>
                  </div>
                </div>
              </div>
              <table class="user-list-table table dataTable no-footer dtr-column" id="DataTables_Table_0" role="grid"
                aria-describedby="DataTables_Table_0_info">
                <thead class="table-light">
                  <tr role="row">
                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                      style="width: 84.6125px;" aria-label="User: activate to sort column ascending">No.</th>
                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                      style="width: 84.6125px;" aria-label="User: activate to sort column ascending">Email</th>
                    <th class="sorting sorting_desc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                      colspan="1" style="width: 94.25px;" aria-sort="descending"
                      aria-label="Email: activate to sort column ascending">Pesan</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($kritik as $i => $item)

                  <tr class="odd">
                    <td valign="top" class="dataTables_empty">{{ $i+1 }}</td>
                    <td valign="top" class="dataTables_empty">{{ $item->email }}</td>
                    <td valign="top" class="dataTables_empty">{{ $item->pesan }}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              <div class="d-flex justify-content-between mx-2 row mb-1">
                <div class="col-sm-12 col-md-6">
                  <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
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
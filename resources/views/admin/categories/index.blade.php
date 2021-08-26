@extends('admin.layouts.master')

@section('page')
Lihat Kategori
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
                    <div class="dt-buttons btn-group flex-wrap"><button class="btn add-new btn-primary mt-50 mb-2"
                        tabindex="0" aria-controls="DataTables_Table_0" type="button" data-bs-toggle="modal"
                        data-bs-target="#modals-slide-in"><span>Tambah Kategori</span></button> </div>
                  </div>
                </div>
              </div>
              <table class="user-list-table table dataTable no-footer dtr-column" id="DataTables_Table_0" role="grid"
                aria-describedby="DataTables_Table_0_info">
                <thead class="table-light">
                  <tr role="row">
                    <th class="control sorting_disabled" rowspan="1" colspan="1" style="width: 23.6px; display: none;"
                      aria-label=""></th>
                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                      style="width: 84.6125px;" aria-label="User: activate to sort column ascending">ID</th>
                    <th class="sorting sorting_desc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                      colspan="1" style="width: 94.25px;" aria-sort="descending"
                      aria-label="Email: activate to sort column ascending">Nama Kategori</th>
                    <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 116.425px;" aria-label="Actions">
                      Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($categories as $category)

                  <tr class="odd">
                    <td valign="top" class="dataTables_empty">{{ $category->id }}</td>
                    <td valign="top" class="dataTables_empty">{{ $category->category_name }}</td>
                    <td valign="top" class="dataTables_empty">
                      {{ Form::open(['route' => ['category.destroy', $category->id], 'method'=>'GET']) }}
                      {{ link_to_route('category.edit','Edit', $category->id, ['class' => 'btn btn-info']) }}
                      {{ Form::button('Delete', ['type'=>'submit','class'=>'btn btn-danger','onclick'=>'return confirm("Anda yakin akan menghapus ini?")'])  }}                      
                      {{ Form::close() }}
                    </td>
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


          <!-- Modal to add new product starts-->
          <div class="modal modal-slide-in new-user-modal fade" id="modals-slide-in">
            <div class="modal-dialog">
              <form action="{{url('admin/categories')}}" method="post" class="add-new-user modal-content pt-0"
                novalidate="novalidate" enctype="multipart/form-data">
                {{ csrf_field() }}
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                <div class="modal-header mb-1">
                  <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori</h5>
                </div>
                <div class="modal-body flex-grow-1">
                  <div class="mb-1">
                    <label class="form-label" for="basic-icon-default-fullname">Nama Kategori</label>
                    <input type="text" class="form-control dt-full-name" id="basic-icon-default-fullname" name="category_name"
                      aria-label="John Doe" aria-describedby="basic-icon-default-fullname2">
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
@extends('backend.layouts.app')

@section('title', 'Lxmart Dashboard, Admin Area')

@section('content')

{{-- <h1>Category Page</h1> --}}

<!-- Display message from server on success -->
{{-- @if ( Session::has('success') )
  <div class="alert alert-success">
    {{ Session::get('success') }}
    @php
        Session::forget('success');
    @endphp
  </div>
@endif --}}

<!-- Display message from server on error -->
{{-- @if ( Session::has('error') )
  <div class="alert alert-warning">
    {{ Session::get('error') }}
    @php
        Session::forget('error');
    @endphp
  </div>
@endif --}}

<!-- Add Category functionality -->
{{-- <button type="button" class="btn btn-warning" data-toggle="modal"
        data-target=".bd-category-modal-md">
        Add Category
</button> --}}

<!-- Add Subcategory functionality -->
{{-- <button type="button" class="btn btn-warning" data-toggle="modal"
        data-target=".bd-subcategory-modal-md">
        Add Subcategory
</button> --}}

<!-- Add Product functionality -->
{{-- <button type="button" class="btn btn-warning" data-toggle="modal"
        data-target=".bd-product-modal-md">
        Add Product
</button> --}}

<div class="templatemo-content-wrapper">
    <div class="templatemo-content">
      <ol class="breadcrumb">
        <li>
          <a href="">Admin Panel</a>
        </li>
        <li>
          <a href="{{ route('manage.user-order') }}">Manage Users</a>
        </li>
        <li class="active">Tables</li>
      </ol>
      <h1>Manage Users & Orders</h1>

      <div class="row margin-bottom-30">
        <div class="col-md-12">
          <ul class="nav nav-pills">
            <li class="active">
              <a href="">
                Users <span class="badge">42</span>
              </a>
            </li>
            <li >
              <a href="">
                Customers <span class="badge">40</span>
              </a>
            </li>
            <li >
              <a href="">
                Orders <span class="badge">60</span>
              </a>
            </li>
            <li >
              <a href="">
                Order - details <span class="badge">40</span>
              </a>
            </li>
          </ul>
        </div><!-- .col-md-12 -->
      </div><!-- .row margin-bottom-30 -->

      <div class="row">
        <div class="col-md-12">
          <div class="btn-group pull-right"
               id="templatemo_sort_btn">
            <button type="button" class="btn btn-default">
              Sort by
            </button>
            <button type="button" class="btn btn-default
                    dropdown-toggle" data-toggle="dropdown">
              <span class="caret"></span>
              <span class="sr-only">
                Toggle Dropdown
              </span>
            </button>
            <ul class="dropdown-menu" role="menu">
              <li>
                <a href="">First Name</a>
              </li>
              <li>
                <a href="">Last Name</a>
              </li>
              <li>
                <a href="">Username</a>
              </li>
            </ul>
          </div><!-- .btn-group pull-right -->

          <div class="table-responsive">
            <h4 class="margin-bottom-15">Users Table</h4>
            <table class="table table-striped table-hover
                   table-bordered">
              <thead>
                <tr>
                  <th>#</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Email</th>
                  <th>Edit</th>
                  <th>Role</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>Cascarr</td>
                  <td>Ihesie</td>
                  <td>c.ihesie91@gmail.com</td>
                  <td>
                    <a href="" class="btn btn-default">Edit</a>
                  </td>
                  <td>
                    <!-- Split button -->
                    <div class="btn-group">
                      <button type="button" class="btn btn-info">
                        Action
                      </button>
                      <button type="button" class="btn btn-info
                              dropdown-toggle" data-toggle="dropdown">
                        <span class="caret"></span>
                        <span class="sr-only">
                          Toggle Dropdown
                        </span>
                      </button>
                      <ul class="dropdown-menu" role="menu">
                        <li>
                          <a href="">Admin</a>
                        </li>
                        <li>
                          <a href="">Non-admin</a>
                        </li>
                      </ul>
                    </div><!-- .btn-group -->
                  </td>
                  <td>
                    <a href="" class="btn btn-link">Delete</a>
                  </td>
                </tr>
              </tbody>
            </table>
          </div><!-- .table-responsive -->

          <div class="table-responsive">
            <h4 class="margin-bottom-15">Customers Table</h4>
            <table class="table table-striped table-hover
                   table-bordered">
              <thead>
                <tr>
                  <th>#</th>
                  <th>User ID</th>
                  <th>Billing Address</th>
                  <th>Default Shipping Address</th>
                  <th>Country</th>
                  <th>Phone</th>
                  <th>Edit</th>
                  {{-- <th>Action</th> --}}
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>Cascarr</td>
                  <td>46 Ohi-zaki</td>
                  <td>Greenroof Jahi 2</td>
                  <td>Nigeria</td>
                  <td>+234 907 129 9461</td>
                  <td>
                    <a href="" class="btn btn-default">Edit</a>
                  </td>
                  {{-- <td> --}}
                    <!-- Split button -->
                    {{-- <div class="btn-group">
                      <button type="button" class="btn btn-info">
                        Action
                      </button>
                      <button type="button" class="btn btn-info
                              dropdown-toggle" data-toggle="dropdown">
                        <span class="caret"></span>
                        <span class="sr-only">
                          Toggle Dropdown
                        </span>
                      </button>
                      <ul class="dropdown-menu" role="menu">
                        <li>
                          <a href="">Active</a>
                        </li>
                        <li>
                          <a href="">Non-active</a>
                        </li>
                      </ul>
                    </div> --}}
                    <!-- .btn-group -->
                  {{-- </td> --}}
                  <td>
                    <a href="" class="btn btn-link">Delete</a>
                  </td>
                </tr>
              </tbody>
            </table>
          </div><!-- .table-responsive -->

          <div class="table-responsive">
            <h4 class="margin-bottom-15">Orders Table</h4>
            <table class="table table-striped table-hover
                   table-bordered">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Customer ID</th>
                  <th>Amount</th>
                  <th>Shipping Address</th>
                  <th>Order Address</th>
                  <th>Order Email</th>
                  <th>Order Status</th>
                  <th>Edit</th>
                  {{-- <th>Action</th> --}}
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>Cascarr</td>
                  <td>2500</td>
                  <td>Greenroof Jahi 2</td>
                  <td>Greenroof Jahi 2</td>
                  <td>c.ihesie91@gmail.com</td>
                  <td>0</td>
                  <td>
                    <a href="" class="btn btn-default">Edit</a>
                  </td>
                  {{-- <td> --}}
                    <!-- Split button -->
                    {{-- <div class="btn-group">
                      <button type="button" class="btn btn-info">
                        Action
                      </button>
                      <button type="button" class="btn btn-info
                              dropdown-toggle" data-toggle="dropdown">
                        <span class="caret"></span>
                        <span class="sr-only">
                          Toggle Dropdown
                        </span>
                      </button>
                      <ul class="dropdown-menu" role="menu">
                        <li>
                          <a href="">Active</a>
                        </li>
                        <li>
                          <a href="">Non-active</a>
                        </li>
                      </ul>
                    </div> --}}
                    <!-- .btn-group -->
                  {{-- </td> --}}
                  <td>
                    <a href="" class="btn btn-link">Delete</a>
                  </td>
                </tr>
              </tbody>
            </table>
          </div><!-- .table-responsive -->

          <div class="table-responsive">
            <h4 class="margin-bottom-15">Order Details Table</h4>
            <table class="table table-striped table-hover
                   table-bordered">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Order ID</th>
                  <th>Product ID</th>
                  <th>Price</th>
                  <th>Quantity</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>Order 1</td>
                  <td>Product 20</td>
                  <td>Product price</td>
                  <td>2</td>
                  <td>
                    <a href="" class="btn btn-default">Edit</a>
                  </td>

                  <td>
                    <a href="" class="btn btn-link">Delete</a>
                  </td>
                </tr>
              </tbody>
            </table>
          </div><!-- .table-responsive -->

        </div><!-- .col-md-12 -->
      </div><!-- .row -->

    </div><!-- .templatemo-content -->
</div><!-- .templatemo-content-wrapper -->



@endsection


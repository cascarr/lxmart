@extends('backend.layouts.app')
@section('title', 'Lxmart Dashboard')

@section('content')

<div class="templatemo-content-wrapper">
    <div class="templatemo-content">
      <ol class="breadcrumb">
        <li>
          <a href="">Admin Panel</a>
        </li>
        <li>
          <a href="{{ route('manage.user-order') }}">Manage Inventories</a>
        </li>
        <li class="active">Tables</li>
      </ol>
      <h1>Manage Inventories</h1>

      <div class="row margin-bottom-30">
        <div class="col-md-12">
          <ul class="nav nav-pills">
            <li class="active">
              <a href="">
                Categories <span class="badge">10</span>
              </a>
            </li>
            <li >
              <a href="">
                Subcategories <span class="badge">20</span>
              </a>
            </li>
            <li >
              <a href="">
                Products <span class="badge">100</span>
              </a>
            </li>
            <li >
              <a href="">
                Product Options <span class="badge">3</span>
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
            <h4 class="margin-bottom-15">Categories Table</h4>
            <table class="table table-striped table-hover
                   table-bordered">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Description</th>
                  <th>Edit</th>
                  <th>Role</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>Men</td>
                  <td>All men's clothing</td>
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
            <h4 class="margin-bottom-15">Subcategories Table</h4>
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
            <h4 class="margin-bottom-15">Products Table</h4>
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

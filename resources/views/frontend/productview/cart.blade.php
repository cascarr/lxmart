@extends('frontend.layouts.app')

@section('title', 'Shopping Cart')

@section('content')

<div class="container padding-bottom-3x mb-1">

    <!-- Alert-->
    <div class="alert alert-info alert-dismissible fade show text-center" style="margin-bottom: 30px;">
        <span class="alert-close" data-dismiss="alert"></span>
        <strong>Shopping Cart</strong>
    </div><!-- .alert alert-info -->

    {{-- @if ($message == Session::get('success')) --}}
    @if($message = session()->get('success'))
        <div>
            <p class="alert alert-success">
                {{ $message }}
            </p>
        </div>
    @endif



    {{-- @if (!Auth::check() && count(Session::get('cart', array())) == 0) --}}
    @if (!$checklogin && count(session()->get('cart', array())) == 0)
    <!-- show this message when this is a visitor && has no record in session -->

      <div>
        <p class="alert alert-warning">
            Your shopping cart is currently empty (session).
        </p>
      </div>


    @elseif ($cartSecurity && $cartCount >= 1)
    <!--(Authenticated users only) when there cart record isn't empty  -->

        <!-- logic comes in here -->
        @php
        $total = 0
        @endphp

        <!-- Shopping Cart-->
        <div class="table-responsive shopping-cart">
            <table class="table">

                <thead>
                    <tr>
                        <th>Product</th>
                        <th class="text-center">Quantity</th>
                        <th class="text-center">Price</th>
                        <th class="text-center">Subtotal</th>
                        <th class="text-center">
                                Action
                        </th>
                    </tr>
                </thead>

                <tbody>

                    <!-- logic comes in here -->

                    @foreach ($cartItems as $cartItem)
                    @php
                    $total += $cartItem->product->price * $cartItem->quantity;
                    @endphp

                        <tr data-id="{{ $cartItem->id }}">

                            <td data-th="Product">
                                <div class="product-item">
                                    <a class="product-thumb" href="#">
                                        <img src="{{ asset('/storage/uploads/'.$cartItem->product->product_img) }}" alt="">
                                    </a>
                                    <div class="product-info">
                                        <h4 class="product-title">
                                            <a href="#">
                                                {{ $cartItem->product->name }}
                                            </a>
                                        </h4>
                                    </div><!-- product-info -->
                                </div><!-- product-item -->
                            </td>

                            <td data-th="Quantity">
                                <input type="number" value="{{ $cartItem->quantity }}" class="form-control quantity cart_update" min="1" />
                            </td>

                            <td data-th="Price" class="text-center text-lg text-medium">
                                &#8358;{{ $cartItem->product->price }}
                            </td>
                            <td data-th="Subtotal" class="text-center text-lg text-medium">
                                &#8358;{{ $cartItem->product->price * $cartItem->quantity }}.00
                            </td>
                            <td class="text-center">
                                <a class="remove-from-cart cart_remove" href="" data-toggle="tooltip" title="" data-original-title="Remove item">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>

                    @endforeach

                    <!-- logic ends here -->

                </tbody>
            </table>
        </div><!-- table-responsive shopping-cart -->

        <!-- logic ends here -->

    @elseif ($checklogin && $cartCount == 0)
    <!-- show this message when we have no record in the cart table && this is our 1st user -->

        <div>
            <p class="alert alert-warning">
                Your shopping cart is currently empty (database record).
            </p>
        </div>

    @else
    <!-- show this message when this is a visitor && has a record in session -->

    <!-- logic comes in here -->
    @php
    $total = 0
    @endphp

    <!-- Shopping Cart-->
    <div class="table-responsive shopping-cart">
        <table class="table">

            <thead>
                <tr>
                    <th>Product</th>
                    <th class="text-center">Quantity</th>
                    <th class="text-center">Price</th>
                    <th class="text-center">Subtotal</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>

            <tbody>

                <!-- logic comes in here -->


                @foreach (session('cart') as $id => $details)
                    @php
                    $total += $details['price'] * $details['quantity'];
                    @endphp

                    <tr data-id="{{ $id }}">

                        <td data-th="Product">
                            <div class="product-item">
                                <a class="product-thumb" href="#">
                                    <img src="{{ asset('/storage/uploads/'.$details['product_image']) }}" alt="">
                                </a>
                                <div class="product-info">
                                    <h4 class="product-title">
                                        <a href="#">
                                            {{-- {{ Str::words($item->name,20) }} --}}
                                            {{ $details['product_name'] }}
                                        </a>
                                    </h4>
                                </div><!-- product-info -->
                            </div><!-- product-item -->
                        </td>

                        <td data-th="Quantity">
                            <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity cart_update" min="1" />
                        </td>

                        <td data-th="Price" class="text-center text-lg text-medium">
                            &#8358;{{ $details['price'] }}
                        </td>
                        <td data-th="Subtotal" class="text-center text-lg text-medium">
                            &#8358;{{ $details['price'] * $details['quantity'] }}.00
                        </td>
                        <td class="text-center">
                            <a class="remove-from-cart cart_remove" href="" data-toggle="tooltip" title="" data-original-title="Remove item">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
                    </tr>

                @endforeach

                <!-- logic ends here -->

            </tbody>
        </table>
    </div><!-- table-responsive shopping-cart -->
    @endif

    <div class="shopping-cart-footer">
        {{-- @if (session('cart')) --}}
        {{-- @if (!Auth::check() && count(Session::get('cart', array())) >= 1) --}}
        @if (count(session()->get('cart', array())) >= 1)
            <div class="column text-lg">
                Total:
                <span class="text-medium">
                        &#8358;{{ $total }}.00
                </span>
            </div>
            {{-- <p>new test</p> --}}

        {{-- @elseif (Auth::check() && $cartCount != 0) --}}
        @elseif ($checklogin && $cartCount != 0)
        {{-- @elseif ($cartSecurity && $cartCount >= 1) --}}

        <div class="column text-lg">
            Total:
            <span class="text-medium">
                    &#8358;{{ $total }}.00
            </span>
        </div>

        @endif
    </div><!-- shopping-cart-footer -->

    <div class="shopping-cart-footer">
        <div class="column">
            <a class="btn btn-outline-secondary" href="/">
                <i class="icon-arrow-left"></i>
                &nbsp;Continue Shopping
            </a>
        </div><!-- column -->

        <div class="column">
            {{-- @if (!Auth::check() && session('cart')) --}}
            @if (!$checklogin && session('cart'))

                <a class="btn btn-danger" href="{{ route('checkout_cart.clear') }}" >Clear Cart</a>
                <a class="btn btn-success" href="{{ route('orderform') }}">Checkout</a>

                {{-- @elseif (Auth::check() && $cartCount != 0) --}}
            @elseif ($cartSecurity && $cartCount >= 1)

                <a class="btn btn-danger" href="{{ route('checkout_cart.clear') }}" >Clear Cart</a>
                <a class="btn btn-success" href="{{ route('orderform') }}">Checkout</a>

            @endif
        </div><!-- column -->

    </div><!-- shopping-cart-footer -->
</div><!-- container -->

@endsection



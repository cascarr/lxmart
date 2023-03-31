@extends('frontend.layouts.app')

@section('title', 'checkout-page')

@section('content')

   @if (session('cart'))
   <!-- show this message when this is a visitor -->

        <div>
            <p class="alert alert-warning">
                Welcome, you are on session.
            </p>
        </div>

        <div class="checkout-body">
            <div class="container">

                <h1 class="h3 mb-5">
                    Confirm Your Order
                </h1>

                <form action="{{ route('submitorder.form') }}" method="post">
                    @csrf

                    <div class="row" style="margin-bottom: 35px;">

                        <!-- Left -->
                        <div class="col-lg-9">
                            <div class="card accordion" id="accordionPayment" style="margin-bottom: 30px;">

                                <div class="accordion-item mb-3">
                                    <h2 class="h5 px-4 py-3 accordion-header d-flex justify-content-between align-items-center">
                                        <div class="form-check w-100 collapsed" data-bs-toggle="collapse" data-bs-target="#collapseCC" aria-expanded="false">
                                            <label for="payment1" class="form-check-label pt-1">
                                                Credit Card
                                            </label>
                                        </div><!-- .form-check w-100 -->
                                        <span>
                                            <svg width="34" height="25" xmlns="http://www.w3.org/2000/svg">
                                                <g fill-rule="nonzero" fill="#333840">
                                                    <path d="M29.418 2.083c1.16 0 2.101.933 2.101 2.084v16.666c0 1.15-.94 2.084-2.1 2.084H4.202A2.092 2.092 0 0 1 2.1 20.833V4.167c0-1.15.941-2.084 2.102-2.084h25.215ZM4.203 0C1.882 0 0 1.865 0 4.167v16.666C0 23.135 1.882 25 4.203 25h25.215c2.321 0 4.203-1.865 4.203-4.167V4.167C33.62 1.865 31.739 0 29.418 0H4.203Z"></path>
                                                    <path d="M4.203 7.292c0-.576.47-1.042 1.05-1.042h4.203c.58 0 1.05.466 1.05 1.042v2.083c0 .575-.47 1.042-1.05 1.042H5.253c-.58 0-1.05-.467-1.05-1.042V7.292Zm0 6.25c0-.576.47-1.042 1.05-1.042H15.76c.58 0 1.05.466 1.05 1.042 0 .575-.47 1.041-1.05 1.041H5.253c-.58 0-1.05-.466-1.05-1.041Zm0 4.166c0-.575.47-1.041 1.05-1.041h2.102c.58 0 1.05.466 1.05 1.041 0 .576-.47 1.042-1.05 1.042H5.253c-.58 0-1.05-.466-1.05-1.042Zm6.303 0c0-.575.47-1.041 1.051-1.041h2.101c.58 0 1.051.466 1.051 1.041 0 .576-.47 1.042-1.05 1.042h-2.102c-.58 0-1.05-.466-1.05-1.042Zm6.304 0c0-.575.47-1.041 1.051-1.041h2.101c.58 0 1.05.466 1.05 1.041 0 .576-.47 1.042-1.05 1.042h-2.101c-.58 0-1.05-.466-1.05-1.042Zm6.304 0c0-.575.47-1.041 1.05-1.041h2.102c.58 0 1.05.466 1.05 1.041 0 .576-.47 1.042-1.05 1.042h-2.101c-.58 0-1.05-.466-1.05-1.042Z"></path>
                                                </g>
                                            </svg>
                                        </span>
                                    </h2>
                                    <div id="collapseCC" class="accordion-collapse collapse show" data-bs-parent="#accordionPayment" style="">
                                        <div class="accordion-body">
                                            <div class="row">

                                                <div class="col-lg-6">
                                                    <div class="mb-3" style="margin-left: 25px;">
                                                        <label for="" class="form-label">
                                                            Name on Card
                                                        </label>
                                                        <input type="text" class="form-control"  id="cname" name="cname" placeholder="" required>
                                                    </div><!-- .mb-3 -->
                                                </div><!-- .col-lg-6 -->
                                                <div class="mb-3">
                                                    <label for="" class="form-label">
                                                        Expiry date
                                                    </label>
                                                    <input type="text" class="form-control"  id="cexpirydate" name="cexpirydate" placeholder="MM/YY" required>
                                                </div><!-- .mb-3 -->
                                                <div class="mb-3">
                                                    <label for="" class="form-label">
                                                        CVV
                                                    </label>
                                                    <input type="pin" class="form-control"  id="c_cvv" name="c_cvv" required>
                                                </div><!-- .mb-3 -->

                                                <div class="col-lg-6">
                                                    <div class="mb-3" style="margin-left: 25px;">
                                                        <label for="" class="form-label">
                                                            Card Number
                                                        </label>
                                                        <input type="text" class="form-control"  id="cc_no" name="cc_no" placeholder="" required>
                                                    </div><!-- .mb-3 -->
                                                </div><!-- .col-lg-6 -->

                                                <div class="mb-3">
                                                    <label for="" class="form-label">
                                                        City
                                                    </label>
                                                    <input type="text" class="form-control"  id="city" name="city" placeholder="" required>
                                                </div><!-- .mb-3 -->

                                                <div class="mb-3">
                                                    <label for="" class="form-label">
                                                        Phone
                                                    </label>
                                                    <input type="phone" class="form-control"  id="phone" name="phone" placeholder="" required>
                                                </div><!-- .mb-3 -->

                                                <div class="col-lg-6">
                                                    <div class="mb-3" style="margin-left: 25px;">
                                                        <label for="" class="form-label">
                                                            Address
                                                        </label>
                                                        <input type="text" class="form-control"  id="address" name="address" placeholder="" required>
                                                    </div><!-- .mb-3 -->
                                                </div><!-- .col-lg-6 -->

                                            </div><!-- .row -->

                                        </div><!-- .accordion-body -->
                                    </div><!-- .accordion-collapse -->

                                </div><!-- .accordion-item mb-3 -->

                            </div><!-- .accordion -->
                        </div><!-- .col-lg-9 --><!-- Left -->
                        <br>

                        <!-- Right -->
                        <div class="col-lg-3">

                            <!-- logic from cart -->
                            @php
                                $total = 0;
                            @endphp



                            <div class="card position-sticky top-0">
                                <div class="p-3 bg-light bg-opacity-10">
                                    <h6 class="card-title mb-3">
                                        Order Summary
                                    </h6>

                                    @foreach (session('cart') as $id => $details)
                                         @php
                                             $total += $details['price'] * $details['quantity'];
                                         @endphp

                                        <div class="d-flex justify-content-between mb-1 small">
                                            <span>{{ $details['product_name'] }}</span>
                                            <span>&#8358;{{ $details['price'] * $details['quantity'] }}</span>
                                        </div>
                                        <!-- .d-flex justify-content-between -->
                                    @endforeach

                                    <hr>
                                    @if (session('cart'))
                                        <div class="d-flex justify-content-between mb-4 small">
                                            <span>TOTAL</span><strong class="text-dark">&#8358;{{ $total }}.00</strong>
                                        </div><!-- .d-flex justify-content-between -->
                                    @endif


                                    <button type="submit" class="btn btn-primary w-100 mt-2">
                                        Place order
                                    </button>


                                </div><!-- .p-3 bg-light -->
                            </div><!-- .card position-sticky -->
                        </div><!-- .col-lg-3 -->

                    </div><!-- .row -->

                </form>


            </div><!-- .container -->
       </div><!-- .checkout-body -->

   @elseif (Auth::check())

    <div class="checkout-body">
        <div class="container">

            <h1 class="h3 mb-5">
                Confirm Your Order (Auth)
            </h1>
            <form action="{{ route('submitorder.form') }}" method="post">
                @csrf

                <div class="row" style="margin-bottom: 35px;">

                    <!-- Left -->
                    <div class="col-lg-9">
                        <div class="card accordion" id="accordionPayment" style="margin-bottom: 30px;">

                            <div class="accordion-item mb-3">
                                <h2 class="h5 px-4 py-3 accordion-header d-flex justify-content-between align-items-center">
                                    <div class="form-check w-100 collapsed" data-bs-toggle="collapse" data-bs-target="#collapseCC" aria-expanded="false">
                                        <label for="payment1" class="form-check-label pt-1">
                                            Credit Card
                                        </label>
                                    </div><!-- .form-check w-100 -->
                                    <span>
                                        <svg width="34" height="25" xmlns="http://www.w3.org/2000/svg">
                                            <g fill-rule="nonzero" fill="#333840">
                                                <path d="M29.418 2.083c1.16 0 2.101.933 2.101 2.084v16.666c0 1.15-.94 2.084-2.1 2.084H4.202A2.092 2.092 0 0 1 2.1 20.833V4.167c0-1.15.941-2.084 2.102-2.084h25.215ZM4.203 0C1.882 0 0 1.865 0 4.167v16.666C0 23.135 1.882 25 4.203 25h25.215c2.321 0 4.203-1.865 4.203-4.167V4.167C33.62 1.865 31.739 0 29.418 0H4.203Z"></path>
                                                <path d="M4.203 7.292c0-.576.47-1.042 1.05-1.042h4.203c.58 0 1.05.466 1.05 1.042v2.083c0 .575-.47 1.042-1.05 1.042H5.253c-.58 0-1.05-.467-1.05-1.042V7.292Zm0 6.25c0-.576.47-1.042 1.05-1.042H15.76c.58 0 1.05.466 1.05 1.042 0 .575-.47 1.041-1.05 1.041H5.253c-.58 0-1.05-.466-1.05-1.041Zm0 4.166c0-.575.47-1.041 1.05-1.041h2.102c.58 0 1.05.466 1.05 1.041 0 .576-.47 1.042-1.05 1.042H5.253c-.58 0-1.05-.466-1.05-1.042Zm6.303 0c0-.575.47-1.041 1.051-1.041h2.101c.58 0 1.051.466 1.051 1.041 0 .576-.47 1.042-1.05 1.042h-2.102c-.58 0-1.05-.466-1.05-1.042Zm6.304 0c0-.575.47-1.041 1.051-1.041h2.101c.58 0 1.05.466 1.05 1.041 0 .576-.47 1.042-1.05 1.042h-2.101c-.58 0-1.05-.466-1.05-1.042Zm6.304 0c0-.575.47-1.041 1.05-1.041h2.102c.58 0 1.05.466 1.05 1.041 0 .576-.47 1.042-1.05 1.042h-2.101c-.58 0-1.05-.466-1.05-1.042Z"></path>
                                            </g>
                                        </svg>
                                    </span>
                                </h2>
                                <div id="collapseCC" class="accordion-collapse collapse show" data-bs-parent="#accordionPayment" style="">
                                    <div class="accordion-body">
                                        <div class="row">

                                            <div class="col-lg-6">
                                                <div class="mb-3" style="margin-left: 25px;">
                                                    <label for="" class="form-label">
                                                        Name on Card
                                                    </label>
                                                    <input type="text" class="form-control"  id="cname" name="cname" placeholder="" required>
                                                </div><!-- .mb-3 -->
                                            </div><!-- .col-lg-6 -->
                                            <div class="mb-3">
                                                <label for="" class="form-label">
                                                    Expiry date
                                                </label>
                                                <input type="text" class="form-control"  id="cexpirydate" name="cexpirydate" placeholder="MM/YY" required>
                                            </div><!-- .mb-3 -->
                                            <div class="mb-3">
                                                <label for="" class="form-label">
                                                    CVV
                                                </label>
                                                <input type="pin" class="form-control"  id="c_cvv" name="c_cvv" required>
                                            </div><!-- .mb-3 -->

                                            <div class="col-lg-6">
                                                <div class="mb-3" style="margin-left: 25px;">
                                                    <label for="" class="form-label">
                                                        Card Number
                                                    </label>
                                                    <input type="text" class="form-control"  id="cc_no" name="cc_no" placeholder="" required>
                                                </div><!-- .mb-3 -->
                                            </div><!-- .col-lg-6 -->

                                            <div class="mb-3">
                                                <label for="" class="form-label">
                                                    City
                                                </label>
                                                <input type="text" class="form-control"  id="city" name="city" placeholder="" required>
                                            </div><!-- .mb-3 -->

                                            <div class="mb-3">
                                                <label for="" class="form-label">
                                                    Phone
                                                </label>
                                                <input type="phone" class="form-control"  id="phone" name="phone" placeholder="" required>
                                            </div><!-- .mb-3 -->

                                            <div class="col-lg-6">
                                                <div class="mb-3" style="margin-left: 25px;">
                                                    <label for="" class="form-label">
                                                        Address
                                                    </label>
                                                    <input type="text" class="form-control"  id="address" name="address" placeholder="" required>
                                                </div><!-- .mb-3 -->
                                            </div><!-- .col-lg-6 -->

                                        </div><!-- .row -->

                                    </div><!-- .accordion-body -->
                                </div><!-- .accordion-collapse -->

                            </div><!-- .accordion-item mb-3 -->

                        </div><!-- .accordion -->
                    </div><!-- .col-lg-9 --><!-- Left -->
                    <br>

                    <!-- Right -->
                    <div class="col-lg-3">

                        <!-- logic from cart -->
                        @php
                            $total = 0;
                        @endphp



                        <div class="card position-sticky top-0">
                            <div class="p-3 bg-light bg-opacity-10">
                                <h6 class="card-title mb-3">
                                    Order Summary
                                </h6>

                                @foreach ($cartItems as $cartItem)
                                     @php
                                         $total += $cartItem->product->price * $cartItem->quantity;
                                     @endphp

                                    <div class="d-flex justify-content-between mb-1 small">
                                        <span>{{ $cartItem->product->name }}</span><span>&#8358;{{ $cartItem->product->price }}</span>
                                    </div>
                                    <!-- .d-flex justify-content-between -->
                                @endforeach

                                <hr>
                                @if (Auth::check())
                                    <div class="d-flex justify-content-between mb-4 small">
                                        <span>TOTAL</span><strong class="text-dark">&#8358;{{ $total }}.00</strong>
                                    </div><!-- .d-flex justify-content-between -->
                                @endif


                                <button type="submit" class="btn btn-primary w-100 mt-2">
                                    Place order
                                </button>


                            </div><!-- .p-3 bg-light -->
                        </div><!-- .card position-sticky -->
                    </div><!-- .col-lg-3 -->

                </div><!-- .row row -->

            </form>


        </div><!-- .container -->
   </div><!-- .checkout-body -->

   @else
   <!-- show this message when this is a visitor && has record in session -->

   <div>
        <p class="alert alert-warning">
            Sorry, you must be logged in to continue.
        </p>
    </div>


   @endif




@endsection

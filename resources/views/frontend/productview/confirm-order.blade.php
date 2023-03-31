@extends('frontend.layouts.app')

@section('title', 'Lxmart - Confirm_order')

@section('content')

        <div class="card text-center">

            <div class="card-header">
                Order Confirmation
            </div><!-- .card-header -->

            @foreach ($cusCardInfo as $orderCardInfo)
               @foreach ($orderCardInfo->orderedProducts as $orderedProduct)

                <div class="card-body">
                        <h5 class="card-title">
                            Card Name: {{ $orderCardInfo->cc_name }}
                        </h5>
                        <h5 class="card-title">
                            Card Number: {{ $orderCardInfo->user->cc_number }}
                        </h5>
                        <h5 class="card-title">
                            CVV: {{ $orderCardInfo->cc_cvv }}
                        </h5>
                        <h5 class="card-title">
                            Amount: &#8358;{{ $orderedProduct->total_amount }}
                        </h5>
                        <br>

                        <p class="card-text">
                            Do you confirm order details?
                        </p>

                        <form method="POST" action="{{ route('pay') }}" accept-charset="UTF" class="form-horizontal d-none" role="form">
                            @csrf

                            <input type="hidden" name="metadata" value="{{ json_encode($array = ['invoiceId' => $orderedProduct->id]) }}">

                            <input type="hidden" name="email" value="{{ Auth::user()->email }}"> <!-- required field -->

                            <input type="hidden" name="orderID" value="{{ $orderCardInfo->id }}">

                            <input type="hidden" name="amount" value="{{ $orderedProduct->total_amount }}">

                            <input type="hidden" name="cardnum" value="{{ $orderCardInfo->user->cc_number }}">

                            <input type="hidden" name="cvv" value="{{ $orderCardInfo->cc_cvv }}">

                            <input type="hidden" name="xpirydate" value="{{ $orderCardInfo->cc_expirydate }}">

                            <input type="hidden" name="currency" value="NGN">

                            <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}">
                                                                                     {{ csrf_field() }}

                            <a type="submit" class="btn btn-success">
                                <i class="fa fa-plus-circle fa-lg"></i>
                                Pay Now!
                            </a>

                        </form>


                    </div><!-- .card-body -->

               @endforeach
            @endforeach


            <div class="card-footer">
                You're almost done continue
            </div>

        </div><!-- .card text-center -->

@endsection

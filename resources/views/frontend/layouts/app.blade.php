<!DOCTYPE html>
<html >
    <!--  -->
    {{-- lang="{{ str_replace('_', '-', app()->getLocale()) }}" --}}
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>
            @yield('title')
        </title>

        <!-- Styles -->
        @include('frontend.partials.styles')

        <style>

            /** Image Responsiveness */
            .img-response {
                width: 200px;
                height: 300px;
                object-fit: cover;
            }

            .img-footer {
                width: 50px;
                height: 50px;
                object-fit: cover;
            }

            .dropdown-magic {
                position: fixed;
                /* padding-top: 20px; */
                /* display: block; */

            }

            .dropdown-submenu {
                position: relative;
            }

            .dropdown-submenu>.dropdown-menu {
                top: 0;
                left: 100%;
                /* margin-top: -6px; */
                /* margin-left: -1px; */
                -webkit-border-radius: 0 6px 6px 6px;
                -moz-border-radius: 0 6px 6px;
                border-radius: 0 6px 6px 6px;
            }

            .dropdown-submenu:hover>.dropdown-menu {
                display: block;
            }

            .dropdown-submenu>a:after {
                display: block;
                content: " ";
                float: right;
                width: 0;
                height: 0;
                border-color: transparent;
                border-style: solid;
                border-width: 5px 0 5px 5px;
                border-left-color: #ccc;
                margin-top: 5px;
                margin-right: -10px;
            }

            .dropdown-submenu:hover>a:after {
                border-left-color: #fff;
            }

            .dropdown-submenu.pull-left {
                float: none;
            }

            .dropdown-submenu.pull-left>.dropdown-menu {
                left: -100%;
                margin-left: 10px;
                -webkit-border-radius: 6px 0 6px 6px;
                -moz-border-radius: 6px 0 6px 6px;
                border-radius: 6px 0 6px 6px;
            }

            /** checkout page */

            .checkout-body {
                background: #eee;
            }

            .card {
                box-shadow: 0 20px 27px 0 rgb(0 0 0 / 5%);
            }

            .card {
                position: relative;
                display: flex;
                flex-direction: column;
                min-width: 0;
                word-wrap: break-word;
                background-color: #fff;
                background-clip: border-box;
                border: 0 solid rgba(0, 0, 0, .125);
                border-radius: 1rem;
            }

            .card-body {
                -webkit-box-flex: 1;
                -ms-flex: 1 1 auto;
                flex: 1 1 auto;
                padding: 1.5rem 1.5rem;
            }

            /** NEW NAV MENU COMES HERE */
            .dropdown-submenu {
                position: relative;
            }

            .dropdown-submenu>a:after {
                content: "\f0da";
                float: right;
                border: none;
                font-family: 'FontAwesome';
            }

            .dropdown-submenu>.dropdown-menu {
                top: 0;
                left: 100%;
                margin-top: 0px;
                margin-left: 0px;
            }

            /** NEW NAV MENU COMES HERE md-screen */
            @media (min-width: 991px) {
                .dropdown-menu {
                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                }
            }

        </style>

    </head>
    <body >

        <header>
            <div id="top-header">
                <div class="container">
                    <div class="row">

                        <div class="col-md-3">
                            <div class="home-account">
                                <a href="{{ route('all.products') }}">Home</a>

                            </div><!-- home-account -->
                        </div><!-- col-md-3 -->

                        <div class="col-md-3">
                            <div class=" dropright home-account">

                                <a href="" class=" dropdown-toggle"
                                   role="button" id="dropdownTopMenuLink" data-toggle="dropdown"
                                   aria-haspopup="true" aria-expanded="false">
                                   My account
                                </a>

                                <div class="dropdown-menu" aria-labelledby="dropdownTopMenuLink">
                                    @guest

                                    <a href="{{ route('login') }}" class="dropdown-item">
                                        LOG IN
                                    </a>
                                    <a href="{{ route('register-user') }}" class="dropdown-item">
                                        SIGN UP
                                    </a>
                                    @else
                                    <a href="{{ route('signout') }}" class="dropdown-item">
                                        SIGN OUT
                                    </a>
                                    @endguest
                                </div>
                                <!-- dropdown-menu -->

                            </div><!-- dropright home-account -->
                        </div><!-- col-md-3 -->

                        <div class="col-md-6">
                            <div class="cart-info">
                                <i class="fa fa-shopping-cart"></i>
                                (<a href="{{ route('checkout.cart') }}">
                                    @if (!$checkifloggedin)
                                        @if ( count(session()->get('cart', array())) > 1 )
                                        ({{ count(session()->get('cart', array())) }}) items
                                        @else
                                        ({{ count(session()->get('cart', array())) }}) item

                                        @endif

                                    @elseif ($auth_check)

                                        @if ($cartCount > 1)
                                            ({{ $cartCount }}) items
                                            @else
                                            ({{ $cartCount }}) item

                                        @endif

                                    @endif
                                </a>)
                            </div><!-- cart-info  -->
                        </div><!-- col-md-6 -->

                    </div><!-- row -->
                </div><!-- container -->
            </div><!-- top-header -->


            <!-- navbar navbar-expand-lg -->

            <nav class="navbar navbar-expand-lg navbar-light bg-white py-3 shadow-sm">
                <div class="container">
                    <a href="{{ route('all.products') }}" class="navbar-brand font-weight-bold">
                        LxMart
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarContent"
                            aria-controls="navbars" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div id="navbarContent" class="collapse navbar-collapse">
                        <ul class="navbar-nav mr-auto">

                            <!-- Level one dropdown -->
                            <li class="nav-item dropdown">
                                <a href="" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                   class="nav-link dropdown-toggle">
                                    Categories
                                </a>

                                <ul aria-labelledby="dropdownMenu1" class="dropdown-menu border-0 shadow">

                                    <!-- Level two dropdown -->
                                    @foreach ($navcategories as $navcategory)
                                    <li class="dropdown-submenu">
                                        <a href="" id="dropdownMenu2" class="dropdown-item dropdown-toggle" role="button" data-toggle="dropdown"
                                           aria-haspopup="true" aria-expanded="false">
                                            {{-- Hover for action --}}
                                            {{ $navcategory->name }}
                                        </a>

                                        <ul aria-labelledby="dropdownMenu2" class="dropdown-menu border-0 shadow">


                                            @foreach ($navcategory->subcategories as $subcategory)
                                            <li>
                                                <a tabindex="-1" href="" class="dropdown-item">
                                                    {{-- level 2 --}}
                                                    {{ $subcategory->name }}
                                                </a>
                                            </li>
                                            @endforeach

                                        </ul>
                                    </li><!-- End Level two -->
                                    @endforeach
                                </ul>

                            </li><!-- End Level one -->

                            <li class="nav-item">
                                <a href="{{ route('checkout.cart') }}" class="nav-link">Cart</a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link">About</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('confirm.order') }}" class="nav-link">Contact</a>
                            </li>

                        </ul>
                    </div><!-- .collapse navbar-collapse -->

                </div><!-- .navbar-brand font-weight-bold -->
            </nav>

        </header><!-- .header -->



        @yield('content')

        <footer>
            @include('frontend.partials.footer')
        </footer><!-- footer -->


        <!-- Scripts -->
        @include('frontend.partials.scripts')


        <!-- Script for client-side validation -->
        <script>

            /**
             * Functionality for Multi-level dropdown
             */
            $(function() {
                // Multi Level Dropdown
                $("ul.dropdown-menu [data-toggle='dropdown']").on("click", function(e) {
                    e.preventDefault();
                    e.stopPropagation();

                    $(this).siblings().toggleClass("show");

                    if (!$(this).next().hasClass('show')) {
                        $(this).parents('dropdown-menu').first().find('.show').removeClass("show");
                    }

                    $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
                        $('.dropdown-submenu .show').removeClass("show");
                    });

                });
            });



            /**
             * JS script for disabling form submission if
             * there are invalid fields.
            */
           (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply these
                // validation styles to
                var forms = document.getElementsByClassName('needs-validation');

                // Loops over form fields and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');

                    }, false);
                });
            }, false);
           })();

           /**
             * AJAX function for Comment reply
             * functionality
             */
             function rplyComment(id) {

                var replyCommentId = $('#reply_commentId').val(id);

                $('#commentReplyFmModal').modal('show');

            }

           /**
            * AJAX function for dropdown of
            * subcategories
           */
          $(document).ready(function() {

            $("#category").change(function() {
                $.ajax({
                    url: "{{ route('get.subcategories') }}?category_id="+ $(this).val(),
                    method: 'GET',
                    // dataType: 'json',

                    success: function(data) {
                        $('#subcategory').html(data.html);

                    }
                });
            });

          });

          /**
           * AJAX function for Cart Update
          */

         $('.cart_update').change(function(e) {
            e.preventDefault();

            var eleVal = $(this);
            // var trId = eleVal.parents("tr").attr("data-id");

            // alert(trId);

            $.ajax({
                url: '{{ route('cart.update') }}',
                method: "patch",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: eleVal.parents("tr").attr("data-id"),
                    quantity: eleVal.parents("tr").find(".quantity").val()
                },

                success: function (response) {
                    window.location.reload();
                }
            });

         });

         /**
          * Script for remove from cart functionality
         */
        $('.cart_remove').click(function(e) {
            e.preventDefault();

            var ele = $(this);

            if(confirm("Do you really want to remove?")) {
                $.ajax({
                    url: '{{ route('checkout_cart.remove') }}',
                    method: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: ele.parents("tr").attr("data-id")
                    },
                    success: function (response) {
                        window.location.reload();
                    }
                });
            }

        });

        /**
         * functionality to place order
        */
       function placeOrder(amount) {

        var amountVal = amount;
        var cardName = $('#cname').val();
        var cardXpiryDate = $('#cexpirydate').val();
        var cvvCode = $('#c_cvv').val();
        var cardNumber = $('#cc_no').val();
        var perCity = $('#city').val();
        var perPhone = $('#phone').val();
        var perAddress = $('#address').val();

        // alert(amountVal);

        $.ajax({
            method: "POST",
            url: '{{ route('submitorder.form') }}',
            data: {
                nwAmount: amountVal,
                cname: cardName,
                cexpirydate: cardXpiryDate,
                c_cvv: cvvCode,
                cc_no: cardNumber,
                city: perCity,
                phone: perPhone,
                address: perAddress,
            },
            success: function(response) {
                window.location.reload();
            }
        });

       }






        </script>



    </body>
</html>

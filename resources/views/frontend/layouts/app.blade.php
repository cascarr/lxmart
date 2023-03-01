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

        </style>

    </head>
    <body >

        <header>
            <div id="top-header">
                <div class="container">
                    <div class="row">

                        <div class="col-md-3">
                            <div class="home-account">
                                <a href="/">Home</a>
                                <!--
                                <a href="#">My account</a>
                                -->

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
                                    @if (!Auth::check())

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
                                    @endif
                                </div><!-- dropdown-menu -->

                            </div><!-- dropright home-account -->
                        </div><!-- col-md-3 -->

                        <div class="col-md-6">
                            <div class="cart-info">
                                <i class="fa fa-shopping-cart"></i>
                                (<a href="{{ route('checkout.cart') }}">
                                    ({{ count(Session::get('cart', array())) }})
                                     items
                                </a>)
                            </div><!-- cart-info  -->
                        </div><!-- col-md-6 -->

                    </div><!-- row -->
                </div><!-- container -->
            </div><!-- top-header -->

            <div id="main-header">
                <div class="container">
                    <div class="row">

                        <div class="col-md-3">
                            <div class="logo">
                                <a href="/">
                                    <img src="{{ URL::asset('frontend/images/logo.png') }}"
                                         title="LxMart Retail"
                                         alt="LxMart">
                                </a>
                            </div><!-- logo -->
                        </div><!-- col-md-3 -->

                        <div class="col-md-6">
                            <div class="main-menu">
                                <ul>
                                    <li>
                                        <a href="/">Home</a>
                                    </li>
                                    <li>
                                        <a href="#">About</a>
                                    </li>

                                    {{-- <li>
                                        <a href="#">Contact</a>
                                    </li> --}}

                                    <!-- .nav-link  dropdown-magic dropdown-submenu-->
                                    <li class=" ">

                                        <a href="" class=" dropdown-submenu" id="dLabel" role="button"
                                           data-toggle="dropdown" data-target="#">
                                           Category
                                           <span class="caret"></span>
                                        </a>

                                        <ul class="dropdown-menu multi-level" role="menu"
                                            aria-labelledby="dropdownCategory">
                                            @foreach ($navcategories as $navcategory)
                                            <li class="dropdown-submenu">
                                                <a tabindex="-1" href="">
                                                    {{ $navcategory->name }}
                                                </a>

                                                <ul class="dropdown-menu">
                                                    @foreach ($navcategory->subcategories as $subcategory)
                                                    <li>
                                                        <a href="">
                                                            {{ $subcategory->name }}
                                                        </a>
                                                    </li>
                                                    @endforeach
                                                </ul>

                                            </li>
                                            @endforeach
                                        </ul>

                                    </li>

                                </ul>
                            </div><!-- main-menu -->
                        </div><!-- col-md-6 -->


                        <div class="col-md-3">
                            <div class="search-box">
                                <form method="GET" action="" class="search_form" name="search_form">
                                    <input type="text" id="search" />
                                    <input type="submit" id="search-button" />
                                </form>
                            </div>
                        </div>


                    </div><!-- row -->
                </div><!-- container -->
            </div><!-- main-header -->

        </header><!-- header -->

        @yield('content')

        <footer>
            @include('frontend.partials.footer')
        </footer><!-- footer -->


        <!-- Scripts -->
        @include('frontend.partials.scripts')


        <!-- Script for client-side validation -->
        <script>



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
         //$(document).ready(function() {

           // $("#quantity").change(function() {

               // var rowid = $('#rowId').val();
               // var prodId = $('#prodId').val();
               // var rowqty = $('#quantity').val();

               // alert(prodId);

               // $.ajax({


                   // url: '<?php echo url('/cart/update/'); ?>/id='+ rowid,

                   // method: 'GET',
                   // data: "qty="+ rowqty +"& rowId="+ rowid,

                  //  success: function(response) {
                        // alert(data);
                        // $('#quantity').html(data.html);
                        // alert(response);
                    //    console.log(response);
                   // }

               // });
           // });

         //})
         $('.cart_update').change(function(e) {
            e.preventDefault();

            var eleVal = $(this);

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






        </script>



    </body>
</html>

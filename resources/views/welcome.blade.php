@extends('frontend.layouts.app')

@section('content')


        <div id="slider">
            <div class="flexslider">

                <ul class="slides">
                    <li>
                        <div class="slider-caption">
                            <h1>Delicious Meals</h1>
                            <p>
                                Donec justo dui, semper vitae aliquam
                                euzali, ornare pretium enim. Maecenas
                                molestie diam <br><br>
                                eget tellus luctus fermentum.
                            </p>
                            <a href="#">Shop Now</a>
                        </div><!-- slider-caption -->
                        <img src="{{ URL::asset('frontend/images/slide1.jpg') }}" alt="Featured product">
                    </li>
                    <li>
                        <div class="slider-caption">
                            <h1>Ice-cream Menus</h1>
                            <p>
                                Nulla id iaculis ligula. Vivamus mattis quam
                                eget urna tincidunt consequat. Nullam <br><br>
                                consectetur tempor neque vitae iaculis.
                                Aliquam erat volutpat.
                            </p>
                            <a href="#">More Details</a>
                        </div><!-- slider-caption -->
                        <img src="{{ URL::asset('frontend/images/slide2.jpg') }}" alt="">
                    </li>
                    <li>
                        <div class="slider-caption">
                            <h1>Healthy Drinks</h1>
                            <p>
                                Maecenas fermentum est ut elementum vulputate.
                                Ut vel consequat urna. Ut aliquet <br><br>
                                ornare massa, quis dapibus quam condimentum id.
                            </p>
                            <a href="#">Get Ready</a>
                        </div><!-- slider-caption -->
                        <img src="{{ URL::asset('frontend/images/slide3.jpg') }}" alt="">
                    </li>
                </ul>

            </div><!-- flexslider -->
        </div><!-- #slider -->

        <div id="latest-blog">
            <div class="container">

                <div class="row">
                    <div class="col-md-12">
                        <div class="heading-section">
                            <h2>Available Products</h2>
                            <img src="{{ URL::asset('frontend/images/under-heading.png') }}" alt="">
                        </div><!-- heading-section -->
                    </div><!-- col-md-12 -->
                </div><!-- row -->

                <div class="row">

                    <!-- logic comes in here -->
                    <div class="col-md-4 col-sm-6">
                        <div class="blog-post">
                            <div class="blog-thumb">
                                <img src="{{ URL::asset('frontend/images/blogpost1.jpg') }}"
                                     alt="">
                            </div>
                            <div class="blog-content">
                                <div class="content-show">
                                    <h4>
                                        <a href="#">
                                            Summer Sandwich
                                        </a>
                                    </h4>
                                    <span>29 Sep 2084</span>
                                </div><!-- content-show -->
                                <div class="content-hide">
                                    <p>
                                        Sed egestas tincidunt mollis. Suspendisse
                                        rhoncus vitae enim et faucibus.
                                        Ut dignissim nec arcu nec hendrerit.
                                        Sed arcu odio, sagittis vel diam in, malesuada
                                        malesuada risus.
                                        Aenean a sem leo. Nam ultricies dolor et mi tempor,
                                        non pulvinar felis sollicitudin.
                                    </p>
                                </div><!-- content-hide -->
                            </div><!-- blog-content -->
                        </div><!-- blog-post -->
                    </div><!-- col-md-4 col-sm-6 -->
                    <div class="col-md-4 col-sm-6">
                        <div class="blog-post">
                            <div class="blog-thumb">
                                <img src="{{ URL::asset('frontend/images/blogpost1.jpg') }}"
                                     alt="">
                            </div>
                            <div class="blog-content">
                                <div class="content-show">
                                    <h4>
                                        <a href="#">
                                            Summer Sandwich
                                        </a>
                                    </h4>
                                    <span>29 Sep 2084</span>
                                </div><!-- content-show -->
                                <div class="content-hide">
                                    <p>
                                        Sed egestas tincidunt mollis. Suspendisse
                                        rhoncus vitae enim et faucibus.
                                        Ut dignissim nec arcu nec hendrerit.
                                        Sed arcu odio, sagittis vel diam in, malesuada
                                        malesuada risus.
                                        Aenean a sem leo. Nam ultricies dolor et mi tempor,
                                        non pulvinar felis sollicitudin.
                                    </p>
                                </div><!-- content-hide -->
                            </div><!-- blog-content -->
                        </div><!-- blog-post -->
                    </div><!-- col-md-4 col-sm-6 -->
                    <div class="col-md-4 col-sm-6">
                        <div class="blog-post">
                            <div class="blog-thumb">
                                <img src="{{ URL::asset('frontend/images/blogpost1.jpg') }}"
                                     alt="">
                            </div>
                            <div class="blog-content">
                                <div class="content-show">
                                    <h4>
                                        <a href="#">
                                            Summer Sandwich
                                        </a>
                                    </h4>
                                    <span>29 Sep 2084</span>
                                </div><!-- content-show -->
                                <div class="content-hide">
                                    <p>
                                        Sed egestas tincidunt mollis. Suspendisse
                                        rhoncus vitae enim et faucibus.
                                        Ut dignissim nec arcu nec hendrerit.
                                        Sed arcu odio, sagittis vel diam in, malesuada
                                        malesuada risus.
                                        Aenean a sem leo. Nam ultricies dolor et mi tempor,
                                        non pulvinar felis sollicitudin.
                                    </p>
                                </div><!-- content-hide -->
                            </div><!-- blog-content -->
                        </div><!-- blog-post -->
                    </div><!-- col-md-4 col-sm-6 -->
                    <!-- end of logic here -->

                </div><!-- row -->

            </div><!-- container -->
        </div><!-- latest-blog -->

        <div id="testimonails">
            <div class="container">

                <div class="row">
                    <div class="col-md-12">
                        <div class="heading-section">
                            <h2>What Customers Say</h2>
                            <img src="{{ URL::asset('frontend/images/under-heading.png') }}" alt="">
                        </div><!-- heading-section -->
                    </div><!-- col-md-12 -->
                </div><!-- row -->

                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="testimonails-slider">
                            <ul class="slides">

                                <!-- logic comes in here -->
                                <li>
                                    <div class="testimonails-content">
                                        <p>
                                            Sed egestas tincidunt mollis.
                                            Suspendisse rhoncus vitae enim et faucibus.
                                            Ut dignissim nec arcu nec hendrerit sed arcu odio,
                                            sagittis vel diam in, malesuada malesuada risus.
                                            Aenean a sem leo. Nam ultricies dolor et mi tempor,
                                            non pulvinar felis sollicitudin.
                                        </p>
                                        <h6>
                                            Jennifer -
                                            <a href="#">Chief Designer</a>
                                        </h6>
                                    </div>
                                </li>
                                <li>
                                    <div class="testimonails-content">
                                        <p>
                                            Sed egestas tincidunt mollis.
                                            Suspendisse rhoncus vitae enim et faucibus.
                                            Ut dignissim nec arcu nec hendrerit sed arcu odio,
                                            sagittis vel diam in, malesuada malesuada risus.
                                            Aenean a sem leo. Nam ultricies dolor et mi tempor,
                                            non pulvinar felis sollicitudin.
                                        </p>
                                        <h6>
                                            Laureen -
                                            <a href="#">Marketing Executive</a>
                                        </h6>
                                    </div>
                                </li>
                                <!-- end of logic here -->

                            </ul>
                        </div><!-- testimonails-slider -->
                    </div><!-- col-md-8 col-md-offset-2 -->
                </div><!-- row -->

            </div><!-- container -->
        </div><!-- testimonails -->

@endsection

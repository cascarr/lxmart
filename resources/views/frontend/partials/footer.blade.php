<div class="container">
    <div class="top-footer">
        <div class="row">

            <div class="col-md-9">
                <div class="subscribe-form">
                    <span>
                        Get in touch with us
                    </span>
                    <form action="" method="get" class="subscribeForm">
                        <input type="text" id="subscribe">
                        <input type="submit" id="submitButton">
                    </form>
                </div><!-- subscribe-form -->
            </div><!-- col-md-9 -->

        </div><!-- row -->
    </div><!-- top-footer -->

    <div class="main-footer">
        <div class="row">

            <div class="col-md-3">
                <div class="about">
                    <h4 class="footer-title">
                        About LxMart
                    </h4>
                    <p>
                        <strong>
                            <a href="/">LxMart</a>
                        </strong>
                        is a small grocery online store,
                        that collaborates with several local
                        farms to supply the community with
                        organic produce and foods.
                    </p>
                </div><!-- about -->
            </div><!-- col-md-3 -->

            <div class="col-md-3">
                <div class="shop-list">
                    <h4 class="footer-title">
                        Shop Categories
                    </h4>
                    <ul>
                        <!-- logic comes in here -->
                        @foreach ($navcategories as $navcategory)
                            <li>
                                <a href="">
                                    <i class="fa fa-angle-right"></i>
                                    {{ $navcategory->name }}
                                </a>
                            </li>
                        @endforeach
                        <!-- end of logic -->
                    </ul>
                </div><!-- shop-list -->
            </div><!-- col-md-3 -->

            <div class="col-md-3">
                <div class="recent-posts">
                    <h4 class="footer-title">
                        Recent products
                    </h4>

                    <!-- logic comes in here -->
                    <div class="recent-post">
                        <div class="recent-post-thumb">
                            <img src="{{ URL::asset('frontend/images/recent-post1.jpg') }}" alt="">
                        </div><!-- recent-post-thumb -->
                        <div class="recent-post-info">
                            <h6>
                                <a href="">
                                    Fresh Cow Milk
                                </a>
                            </h6>
                            <span>24/12/2084</span>
                        </div><!-- recent-post-info -->
                    </div><!-- recent-post -->
                    <!-- end of logic -->

                </div><!-- recent-posts -->
            </div><!-- col-md-3 -->

            <div class="col-md-3">
                <div class="more-info">
                    <h4 class="footer-title">
                        More info
                    </h4>
                    <p>
                        <strong>
                            <a href="/">LxMart</a>
                        </strong>
                        was developed by
                        <strong>
                            <a href="https://www.linkedin.com/in/cascarr-ihesie-182295a0/" target="_blank">
                                Cascarr Ihesie
                            </a>
                        </strong>. As of the
                        time of publishing of this web project,
                        <strong>Cascarr</strong> was an
                        Information Technology Apprentice at
                        LearnXplore, Abuja Nigeria.
                    </p>
                    <ul>
                        <li>
                            <i class="fa fa-phone"></i>
                            +234 907-129-9461
                        </li>
                        <li>
                            <i class="fa fa-globe"></i>
                            Greenroof Apt, Jahi, Abuja Nigeria.
                        </li>
                        <li>
                            <i class="fa fa-envelope"></i>
                            <a href="#">
                                c.ihesie45nl@gmail.com
                            </a>
                        </li>
                    </ul>
                </div><!-- more-info -->
            </div><!-- col-md-3 -->

        </div><!-- row -->
    </div><!-- main-footer -->

    <div class="bottom-footer">
        <p>
            <span>
                Copyright &copy; 2023
                <a href="/">LxMart</a>
                | Programmer:
                <a href="https://www.linkedin.com/in/cascarr-ihesie-182295a0/" target="_blank">
                    <span class="blue">
                        Cascarr Ihesie
                    </span>
                </a>
            </span>
        </p>
    </div><!-- bottom-footer -->

</div><!-- container -->

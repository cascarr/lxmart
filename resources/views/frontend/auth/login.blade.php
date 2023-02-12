@extends('frontend.auth.layouts.app')

@section('auth_content')

            <form action="{{ route('login.custom') }}" method="POST" class="form-horizontal templatemo-login-form-2"
                  role="form">
                  @csrf

                  <div class="row">
                    <div class="col-md-12">
                        <h1>LxMart Login</h1>
                    </div><!-- col-md-12 -->
                  </div><!-- row -->

                  <div class="row">
                    <div class="templatemo-one-signin col-md-6">

                        <div class="form-group">
                            <div class="col-md-12">
                                <label for="email" class="control-label">
                                    Username
                                </label>
                                <div class="templatemo-input-icon-container">
                                    <i class="fa fa-user"></i>
                                    <input type="email" class="form-control"
                                           id="email" name="email">
                                </div><!-- templatemo-input-icon-container -->
                            </div><!-- col-md-12 -->
                        </div><!-- form-group -->

                        <div class="form-group">
                            <div class="col-md-12">
                                <label for="password" class="control-label">
                                    Password
                                </label>
                                <div class="templatemo-input-icon-container">
                                    <i class="fa fa-lock"></i>
                                    <input type="password" class="form-control"
                                           id="password" name="password">
                                </div><!-- templatemo-input-icon-container -->
                            </div><!-- col-md-12 -->
                        </div><!-- form-group -->

                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="checkbox">
                                    <label for="remember-me">
                                        <input type="checkbox" name="remember_token"
                                               id="remember-me">
                                        Remember me
                                    </label>
                                </div><!-- checkbox -->
                            </div><!-- col-md-12 -->
                        </div><!-- form-group -->

                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="submit" value="LOG IN" class="btn btn-warning">
                            </div><!-- col-md-12 -->
                        </div><!-- form-group -->

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <a href="#" class="text-center">
                                        Cannot login?
                                    </a>
                                </div><!-- form-group -->
                            </div><!-- col-md-6 -->

                            <div class="col-md-6">
                                <div class="form-group">
                                    <a href="{{ route('register-user') }}" class="text-center">
                                        Not registered?
                                    </a>
                                </div><!-- form-group -->
                            </div><!-- col-md-6 -->
                        </div><!-- row -->

                    </div><!-- templatemo-one-signin col-md-6 -->

                    <div class="templatemo-other-signin col-md-6">
                        <label for="" class="margin-bottom-15">
                            One-click sign in using other services.
                        </label>
                        <a href="" class="btn btn-block btn-social
                           btn-facebook margin-bottom-15">
                           <i class="fa fa-facebook"></i>
                           Sign in with Facebook
                        </a>
                        <a href="" class="btn btn-block btn-social
                           btn-twitter margin-bottom-15">
                           <i class="fa fa-twitter"></i>
                           Sign in with Twitter
                        </a>
                        <a href="" class="btn btn-block btn-social btn-google-plus">
                            <i class="fa fa-google-plus"></i>
                            Sign in with Google
                        </a>
                    </div><!-- templatemo-other-signin col-md-6 -->

                  </div><!-- row -->

            </form>

@endsection

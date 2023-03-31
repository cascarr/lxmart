@extends('frontend.auth.layouts.app')

@section('auth_content')

            <form action="{{ route('register.custom') }}" method="post"  class="form-horizontal templatemo-contact-form-1"
                  role="form">
                  @csrf

                  <div class="form-group">
                    <div class="col-md-12">
                        <h1 class="margin-bottom-15">
                            LxMart User Registration
                        </h1>
                    </div><!-- col-md-12 -->
                  </div><!-- form-group -->

                  <div class="form-group">
                    <div class="col-md-12">
                        <label for="name" class="control-label">
                            Name *
                        </label>
                        <div class="templatemo-input-icon-container">
                            <i class="fa fa-user"></i>
                            <input type="text" class="form-control"
                                   id="name" name="name" placeholder="" required>
                        </div><!-- templatemo-input-icon-container -->
                    </div><!-- col-md-12 -->
                </div><!-- form-group -->

                <div class="form-group">
                    <div class="col-md-12">
                        <label for="email" class="control-label">
                            Email *
                        </label>
                        <div class="templatemo-input-icon-container">
                            <i class="fa fa-envelope-o"></i>
                            <input type="email" class="form-control"
                                   id="email" name="email" placeholder="" required>
                        </div><!-- templatemo-input-icon-container -->
                    </div><!-- col-md-12 -->
                </div><!-- form-group -->

                <div class="form-group">
                    <div class="col-md-12">
                        <label for="password" class="control-label">
                            Password *
                        </label>
                        <div class="templatemo-input-icon-container">
                            <i class="fa fa-lock"></i>
                            <input type="password" class="form-control"
                                   id="password" name="password" placeholder="" required>
                        </div><!-- templatemo-input-icon-container -->
                    </div><!-- col-md-12 -->
                </div><!-- form-group -->

                <div class="form-group">
                    <div class="col-md-12">
                        <input type="submit" value="SIGN UP"
                               class="btn btn-warning pull-right">
                    </div><!-- col-md-12 -->
                </div><!-- form-group -->

                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <a href="{{ route('login') }}" class="text-center">
                                Already have an account?
                            </a>
                        </div><!-- form-group -->
                    </div><!-- col-md-6 -->
                </div><!-- row -->

            </form><!-- form-horizontal templatemo-contact-form-1 -->

@endsection

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LxMart - Login</title>
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ url('authsys/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ url('authsys/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('authsys/css/bootstrap-theme.min.css') }}">
    <link rel="stylesheet" href="{{ url('authsys/css/bootstrap-social.css') }}">
    <link rel="stylesheet" href="{{ asset('authsys/css/templatemo_style.css') }}">
</head>
<body class="templatemo-bg-image-1">

    <div class="container">
        <div class="col-md-12">

            @yield('auth_content')

        </div><!-- col-md-12 -->
    </div><!-- container -->

</body>
</html>

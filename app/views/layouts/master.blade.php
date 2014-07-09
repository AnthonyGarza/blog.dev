<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/ico/favicon.png">

    <title>Laravel Blog</title>

    <!-- Bootstrap core CSS -->
    <link href="/assets/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/assets/css/main.css" rel="stylesheet">

	<link rel="stylesheet" href="/assets/css/font-awesome.min.css">

    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,300,700' rel='stylesheet' type='text/css'>

    <script src="/assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="/assets/js/smoothscroll.js"></script>
    <script src="/assets/js/Chart.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="assets/js/html5shiv.js"></script>
      <script src="assets/js/respond.min.js"></script>
    <![endif]-->
  </head>

  <body data-spy="scroll" data-offset="0" data-target="#nav">
    <div class="container">
        @if (Auth::check())
            {{{ Auth::user()->email }}}
            {{ link_to_action('HomeController@logout', "Log Out") }}
        @else
            {{ link_to_action('HomeController@showLogin', "Log In") }}
        @endif
    </div>

    <div class="container">
        @if (Session::has('successMessage'))
            <div class="alert alert-success">{{{ Session::get('successMessage') }}}</div>
        @endif
        @if (Session::has('errorMessage'))
            <div class="alert alert-danger">{{{ Session::get('errorMessage') }}}</div>
        @endif

        @yield('content')
    </div>
    <!-- <div class="container">
        {{ Form::open(array('action' => 'PostsController@index', 'class' => 'form-inline', 'method' => 'GET')) }}
        {{ Form::text('search', null, array('placeholder' => 'Search Query', 'class' => 'form-control col-lg-4')) }}
        <button type="submit" class="btn btn-success">Search</button>
        {{ Form::close() }}
    </div> -->
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="/assets/js/bootstrap.js"></script>
</body>
</html>
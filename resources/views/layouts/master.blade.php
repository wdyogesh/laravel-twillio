<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="../../../public/img/favicon.ico">
    <title>@yield('title') - Rapid Response Kit</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link rel="stylesheet"
          href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet"
          href="//maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../../public/css/broadcast.css">

    @yield('css')
  </head>
  <body>
    <div class="container">
      <div class="hero">
        <i class="fa fa-plus"></i>
        <h1> Rapid Response Kit </h1>
        <p>Instantly communicate with all of your volunteers.</p>
      </div>
      @yield('content')
    </div>
    <!-- JavaScript -->
    <script src="//code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="../../../public/js/broadcast.js"></script>
    @yield('javascript')
  </body>
</html>

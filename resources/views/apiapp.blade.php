<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Patient record system by LotusSoft and YoungTech">
  <meta name="author" content="LotusSoft & YoungTech">
  <title>Hospital e-recording system dashboard</title>
  <!-- Favicon -->
  <link rel="icon" href="/assets/img/brand/favicon.png" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="/assets/vendor/nucleo/css/nucleo.css">
  <link rel="stylesheet" href="/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">
  <!-- Argon CSS -->
  <link rel="stylesheet" href="/assets/css/argon.css?v=1.2.0">
  <style>
    .main-body{
      min-height: 75vh;
    }
  </style>
</head>

<body>
  @if (Auth::check())
  <script>
  window.Laravel = {!!json_encode(['isLoggedin' => true,'user' => Auth::user()])!!}
  window.authUser = {!!json_encode(['user_type' => Auth::user()->user_type])!!}
  </script>
  @else
  <script>
  window.Laravel = {!!json_encode(['isLoggedin' => false])!!}
  window.authUser = {!!json_encode(['user_type' => null])!!}
  </script>
  @endif
  <div id="app"></div>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="/assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="/assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Argon JS -->
  <script src="/assets/js/argon.js?v=1.2.0"></script>
  <script src="{{ mix('js/app.js') }}"></script>
</body>

</html>
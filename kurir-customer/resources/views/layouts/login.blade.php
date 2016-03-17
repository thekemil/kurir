<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Kurir apps- Admin Login</title>

  <link href="{{ asset('css/general.css') }}" rel="stylesheet">
  <script src="{{ asset('js/general.js') }}"></script>

  <link rel="shortcut icon" href="{!! asset('assets/site/ico/favicon.ico')  !!} ">
</head>
<body>
  <div class="container">
    @yield('content')
  </div>
  
  <style>

  .panel-info > .panel-heading {
      color: #FFFFFF;
      background-color: #CC4CC2;
      border-color: #EB00EF;
  }
  
  .panel-info {
      border-color: #EB00EF;
  }
  </style>
</body>
</html>

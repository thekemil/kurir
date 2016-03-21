<!DOCTYPE html>
<html lang="en">
<head>
	
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/img/favicon.png">

    <title>Kurir Apps</title>

    <!-- Bootstrap core CSS -->
	<link href="{{ asset('css/general.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
	<link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">

    <!-- Fonts from Google Fonts -->
	<link href='http://fonts.googleapis.com/css?family=Lato:300,400,900' rel='stylesheet' type='text/css'>
    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
		
		
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	
    

      <!-- Fixed navbar -->
      <div class="navbar navbar-default navbar-fixed-top">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">
            	<img class="img-responsive" src="assets/img/mcl-logo.png" alt="" width="125" height="200">
            </a>
          </div>
          <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
              <li><a href="#">Daftar menjadi cabang?</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>

  	
  	@yield('content')
	
	
  	<div class="container oke">
  		<div class="row centered">
			
  			<div class="col-lg-6 col-lg-offset-3">
				<form class="form-inline" role="form">
					
  				  <div class="form-group">
					
  				    <textarea class="form-control" id="exampleInputEmail1" style="width:400px" placeholder="Masukan feedback Anda"></textarea>
  				  </div>
				  <br/>

				  <br/>
  				  <button type="submit" class="btn btn-primary btn-sm">Kirim Feedback</button>
  				</form>					
  			</div>
  			<div class="col-lg-3"></div>
  		</div><!-- /row -->
  		<hr>
  		<p class="centered">&copy 2016 - Kurir Apps</p>
  	</div><!-- /container -->
	

      <!-- Bootstrap core JavaScript
      ================================================== -->
      <!-- Placed at the end of the document so the pages load faster -->
      <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
      <script src="assets/js/bootstrap.min.js"></script>
	<script>
		// A $( document ).ready() block.
		$( document ).ready(function() {
		    $('.oke').show();
		});
		</script>

@yield('script')

</body>
</html>

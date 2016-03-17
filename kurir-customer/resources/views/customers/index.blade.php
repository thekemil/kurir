@extends('layouts.app')

@section('content')
  	<div id="headerwrap">
  		<div class="container">
  			<div class="row">
  				<div class="col-lg-6">
  					<h1>Cari Nomor Surat Anda<br/>
  					<small style="color:#cccccc">Tracking posisi & status pengiriman</small></h1>
  						{!! Form::open(['route' => 'customer.tracking','class'=>'form-inline']) !!}
  					  <div class="form-group">
						 {!! Form::text('term',null,['id'=>'term','class'=>'form-control','required'=>'true','placeholder'=>'Masukan Nomor Surat','style'=>'width:400px']) !!}
  					  </div>
  					  <button type="submit" class="btn btn-warning btn-lg">Cari</button>
  					{!! Form::close() !!}			
  				</div><!-- /col-lg-6 -->
  				<div class="col-lg-6">
  					<img class="img-responsive" src="assets/img/ipad-hand.png" alt="">
  				</div><!-- /col-lg-6 -->	
  			</div><!-- /row -->
  		</div><!-- /container -->
  	</div><!-- /headerwrap -->

    
@stop

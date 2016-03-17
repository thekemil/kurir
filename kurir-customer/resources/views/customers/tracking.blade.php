

@extends('layouts.app')

@section('content')

	<br/>
	<br/>
	<br/>
	<br/>
	<br/>

	<div class="col-md-10 col-md-offset-1">
		<div class="panel panel-default">
		  <div class="panel-heading">Informasi Status Surat Anda</div>
		  <div class="panel-body">
			<ul class="list-group">
				@if ($results)
				@foreach($results as $r)
				<label>Nama Cabang:</label>
				  <li class="list-group-item" style="color:blue">{{$r->name}}</li>
				<label>Nomor Dokumen:</label>
				  <li class="list-group-item">{{$r->no_doc}}</li>
				<label>Nama Dokumen:</label>
				  <li class="list-group-item">{{$r->doc_name}}</li>
				<label>Nama Penerima:</label>
				  <li class="list-group-item">{{$r->doc_name_received}}</li>
				<label>Alamat Penerima:</label>
				  <li class="list-group-item">{{$r->doc_address}}</li>
				<label>Telp:</label>
				  <li class="list-group-item">{{$r->doc_phone}}</li>
  				<label>Catatan:</label>
  				  <li class="list-group-item">{{$r->doc_note}}</li>
    				<label>Status:</label>
    				  <li class="list-group-item">
						  @if ($r->doc_status == 'on_customer')
						  	<label class="label label-success">Surat Sudah Anda Diterima</label>
						  @elseif ($r->doc_status == 'submited')
						  	<label class="label label-info">Surat sedang dalam pengiriman dari Admin ke Cabang</label>
						  @elseif ($r->doc_status == 'on_packing')
						  	<label class="label label-warning">Surat sedang dalam packing di Cabang</label>
						  @elseif ($r->doc_status == 'on_kurir')
						  	<label class="label label-warning">Surat sedang dalam pengiriman oleh kurir</label>
						  @else
  						  	<label class="label label-danger">Surat gagal di kirim, silahkan hubungi Cabang</label>
						  @endif 
					  </li>
				 @endforeach
				 @else
				 <label class="label label-warning">Nomor surat tidak ditemukan</label>
				 @endif
				</ul>
		  </div>
		</div>
	    <div class="text-right">
				<div class="form-group">
					<a class="btn btn-primary" href="/" role="button">Kembali</a>
				</div>
			</div>
	<br/>

	@section('script')
	
	<script>
		// A $( document ).ready() block.
		$( document ).ready(function() {
		    $('.oke').hide();
		});
		</script>
		@stop
	
<style>
body{
	background-color:white;
}
label {
	font-weight:normal;
}
</style>
@stop

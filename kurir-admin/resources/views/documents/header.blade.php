@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-lg-12">
    <h3 class="page-header">Transaksi Dokumen
      <small>List data transaksi dokumen</small>
    </h3>
    <div class="text-right">
			<div class="form-group">
				<a class="btn btn-primary" href="{!! route('admin.document.header.create') !!}" role="button">+ Transaksi</a>
   
			</div>
		</div>
    <table class="table table-striped table-bordered table-hover" id="doc-header-table">
      <thead>
        <tr class="bg-default">
          <th>No</th>
          <th>Nama Customer</th>
          <th>Tanggal</th>
          <th>Invoice Pengiriman</th>
          <th>Status Invoice Pengiriman</th>
          <th>Date Invoice Pengiriman</th>
		  <th>Aksi</th>
        </tr>
      </thead>
    </table>
  </div>
</div>
@stop

@push('scripts')
<script>
$(document).ready(function() {
    $('#doc-header-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('data.document.header') !!}',
        columns: [
            { data: 'rownum', name: 'rownum',searchable: false},
            { data: 'cust_name', name: 'customers.name' },
            { data: 'date_input', name: 'date_input' },
			{ data: 'invoice_delivery', name: 'invoice_delivery' },
			{ data: 'status_inv_delivery', name: 'status_inv_delivery' ,searchable: false},
			{ data: 'date_inv_delivery', name: 'date_inv_delivery' },
            { data: 'action', name: 'action', orderable: false, searchable: false}
        ]
    });
});
</script>

@endpush

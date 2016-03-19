@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-lg-12">
    <h3 class="page-header">Customer
      <small>List data customer</small>
    </h3>
    <div class="text-right">
			<div class="form-group">
				<a class="btn btn-primary" href="{!! route('admin.customer.create') !!}" role="button">+ Customer</a>
			</div>
		</div>
    <table class="table table-striped table-bordered table-hover" id="customers-table">
      <thead>
        <tr class="bg-default">
          <th>No</th>
          <th>Kode</th>
          <th>Nama</th>
          <th>Alamat</th>
          <th>Nama PIC</th>
          <th>Telp PIC</th>
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
    $('#customers-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('data.customer') !!}',
        columns: [
            {data: 'rownum', name: 'rownum',searchable: false},
            { data: 'code', name: 'code' },
            { data: 'name', name: 'name' },
            { data: 'address', name: 'address' },
            { data: 'pic_name', name: 'pic_name' },
            { data: 'pic_phone', name: 'pic_phone' },
            { data: 'action', name: 'action', orderable: false, searchable: false}
        ]
    });
});
</script>

@endpush

@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-lg-12">
    <h3 class="page-header">Cabang
      <small>List data cabang</small>
    </h3>
    <div class="text-right">
			<div class="form-group">
				<a class="btn btn-primary" href="#" role="button">+ Cabang</a>
			</div>
		</div>
    <table class="table table-striped table-bordered table-hover" id="branches-table">
      <thead>
        <tr class="bg-default">
          <th>No</th>
          <th>Kode Cabang</th>
          <th>Nama</th>
          <th>Alamat</th>
          <th>Telp</th>
          <th>Status</th>
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
    $('#branches-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('data.branch') !!}',
        columns: [
            {data: 'rownum', name: 'rownum',searchable: false},
            { data: 'code', name: 'code' },
            { data: 'name', name: 'name' },
            { data: 'address', name: 'address' },
            { data: 'phone', name: 'phone' },
            { data: 'status', name: 'status' },
            { data: 'action', name: 'action', orderable: false, searchable: false}
        ]
    });
});
</script>

@endpush

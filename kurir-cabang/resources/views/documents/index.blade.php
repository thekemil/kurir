@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-lg-12">
    <h3 class="page-header">Dokumen
      <small>List data dokumen</small>
    </h3>
    <table class="table table-striped table-bordered table-hover" id="docs-table">
      <thead>
        <tr class="bg-default">
          <th>No</th>
          <th>No Dokumen</th>
          <th>Nama Cabang</th>
          <th>Nama Dokumen</th>
          <th>Nama Penerima</th>
		  <th>Alamat Penerima</th>
          <th>Telp Penerima</th>
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
    $('#docs-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('data.document') !!}',
        columns: [
            { data: 'rownum', name: 'rownum',searchable: false},
            { data: 'no_doc', name: 'no_doc' },
            { data: 'branch_id', name: 'branch_id' },
            { data: 'doc_name', name: 'doc_name' },
            { data: 'doc_name_received', name: 'doc_name_received' },
			{ data: 'doc_address', name: 'doc_address' },
            { data: 'doc_phone', name: 'doc_phone' },
            { data: 'doc_status', name: 'doc_status' },  
            { data: 'action', name: 'action', orderable: false, searchable: false}
        ]
    });
});
</script>

@endpush

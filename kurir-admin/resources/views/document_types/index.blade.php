@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-lg-12">
    <h3 class="page-header">Tipe Dokumen
      <small>List data tipe dokumen</small>
    </h3>
    <div class="text-right">
			<div class="form-group">
				<a class="btn btn-primary" href="{!! route('admin.document_type.create') !!}" role="button">+ Tipe Dokumen</a>
			</div>
		</div>
    <table class="table table-striped table-bordered table-hover" id="document_types-table">
      <thead>
        <tr class="bg-default">
          <th>No</th>
          <th>Name</th>
          <th>Amount</th>
          <th>Note</th>
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
    $('#document_types-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('data.document_type') !!}',
        columns: [
            { data: 'rownum', name: 'rownum',searchable: false},
            { data: 'name', name: 'name' },
            { data: 'amount', name: 'amount' },
           	{ data: 'note', name: 'note' },
            { data: 'action', name: 'action', orderable: false, searchable: false}
        ]
    });
});
</script>

@endpush

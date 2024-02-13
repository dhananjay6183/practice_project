@extends('layouts.mainModule')
@section('content')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">


@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
@if (session('delete'))
<div class="alert alert-danger">
    {{ session('delete') }}
</div>
@endif
<a class="btn btn-success m-2 float-right" href="{{ route('admin.brand.create') }}" id="createNewProduct"> Create Brand</a>
<div>
    <div>
        <table class="table table-bordered data-table" id="brand_tbl">
            <thead>
            <tr>
            <th>Brnad Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Action</th>
            </tr>
        </thead>
        </table>
    </div>
</div>
@endsection

@section('customJS')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function() {
    var brand_tbl = $('#brand_tbl').DataTable({
        processing: true,
            serverSide: true,
            ajax: "{{ route('admin.brand.index') }}",
            "data": {
                "_token": "{{ csrf_token() }}"
            },
            columns: [
                {data: 'brand_name', name: 'brand_name'},
                {data: 'description', name: 'description'},
                {data: 'price', name: 'price'},
                {data: 'action', name: 'action',  orderable: false, searchable: false}
            ]
    });
});
</script>
@endsection
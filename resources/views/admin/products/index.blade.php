@extends('layouts.mainModule')
@section('content')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">

<div class="container">
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@if (session('delete'))
    <div class="alert alert-danger">
        {{ session('delete') }}
    </div>
@endif
<a class="btn btn-success m-2 float-right" href="{{ route('admin.product.create') }}" id="createNewProduct"> Create Product</a>
    <table class="table table-bordered data-table" id="product_tbl">
        <thead>
            <tr>
                <th>Name</th>
                <th>Detail</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

@endsection
@section('customJS')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script>
   $(document).ready(function() {
        var product_tbl = $('#product_tbl').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('admin.product.index') }}",
            "data": {
                "_token": "{{ csrf_token() }}"
            },
            columns: [
                {data: 'name', name: 'name'},
                {data: 'detail', name: 'detail'},
                {data: 'action', name: 'action',  orderable: false, searchable: false}
            ]
        });
    });

</script>
@endsection

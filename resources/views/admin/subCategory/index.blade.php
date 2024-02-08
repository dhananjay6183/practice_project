@extends('layouts.mainModule')
@section('content')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">

<div class="container">
<a class="btn btn-success m-2 float-right" href="{{ route('admin.subcategory.create') }}" id="createNewProduct"> Create sub-category</a>
    <table class="table table-bordered data-table" id="subcategory_tbl">
        <thead>
            <tr>
                <th>SubCategory</th>
                <th>Priority</th>
                <th>Description</th>
                <th>Date</th>
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
        var subcategory_tbl = $('#subcategory_tbl').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('admin.subcategory.index') }}",
            "data": {
                "_token": "{{ csrf_token() }}"
            },
            columns: [
                {data: 'subcategory', name: 'subcategory'},
                {data: 'priority', name: 'priority'},
                {data: 'description', name: 'description'},
                {data: 'date', name: 'date'},
                {data: 'action', name: 'action',  orderable: false, searchable: false}
            ]
        });
    });

</script>
@endsection

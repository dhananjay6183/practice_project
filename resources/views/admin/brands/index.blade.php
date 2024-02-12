@extends('layouts.mainModule')
@section('content')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">


<a class="btn btn-success m-2 float-right" href="{{ route('admin.brand.create') }}" id="createNewProduct"> Create Brand</a>
@endsection
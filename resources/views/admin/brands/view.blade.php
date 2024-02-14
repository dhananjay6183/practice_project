@extends('layouts.mainModule')
@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb d-flex m-5">
        <div class="pull-left">
            <h2>Brand</h2>
        </div>
        <div class="pull-right mx-5">
            <a class="btn btn-primary" href="{{ route('admin.brand.index') }}"> Back</a>
            </div>
        </div>
    </div>
<div class="container d-flex justify-content-center">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Category: </strong>
                {{ $brand->brand_name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description: </strong>
                {{ $brand->description }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Date:</strong>
                {{ $brand->price }}
            </div>
        </div>
    </div>
</div>

@endsection
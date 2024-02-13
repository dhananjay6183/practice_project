@extends('layouts.mainModule')
@section('content')
 <div class="container d-flex justify-content-center">
    <div class="main-container p-5">
        <form action="{{ route('admin.brand.store') }}" method="POST" id="brand_form_id">
            @csrf
            <div class="col-md-6 mb-5">
                <label for="BrandName" class="form-label">Brand Name</label>
                <input type="text" class="form-control" name="brand_name" id="brand_name" autocomplete="off">
            </div>
            <div class="col-md-6 mb-5">
                <label for="Description" class="form-label">Description</label>
                <textarea name="description" id="description" cols="50" rows="3"></textarea>
            </div>
            <div class="col-md-6 mb-5">
                <label for="Price" class="form-label">Price</label>
                <input type="number" class="form-control" name="price" id="price" autocomplete="off">
            </div>
            <div class="btn-container d-flex justify-content-center">
                <button type="submit" class="submit btn btn-primary" id="submit_btn">Submit</button>
            </div>
        </form>
    </div>
 </div>
@endsection

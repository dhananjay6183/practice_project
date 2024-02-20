@extends('layouts.mainModule')
@section('content')
 <div class="container d-flex justify-content-center">
    <div class="main-container p-5">
        <form action="{{ route('admin.product.store') }}" method="POST" id="brand_form_id">
            @csrf
            <div class="col-md-6 mb-5">
                <label for="Product" class="form-label">Product Name</label>
                <input type="text" class="form-control" name="name" id="product_name" autocomplete="off">
                @if ($errors->has('name'))
                <span class="error">{{ $errors->first('name') }}</span>
                @endif
            </div>
            <div class="col-md-6 mb-5">
                <label for="Details" class="form-label">Details</label>
                <textarea name="detail" id="detail" cols="50" rows="3"></textarea>
                @if ($errors->has('detail'))
                <span class="error">{{ $errors->first('detail') }}</span>
                @endif
            </div>
            <div class="btn-container d-flex justify-content-center">
                <button type="submit" class="submit btn btn-primary" id="submit_btn">Submit</button>
            </div>
        </form>
    </div>
 </div>
@endsection

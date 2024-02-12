@extends('layouts.mainModule')

@section('content')

<div class="container">
    <div class="d-flex">
        <form action="{{ route('admin.subcategory.store') }}" method="POST" class="row g-3 bg-white m-5 p-5" id="subcategoryForm">
            @csrf
            <div class="col-md-6 mb-5">
                <label for="SubCategory" class="form-label">Sub-Category</label>
                <input type="text" class="form-control" name="subcategory" id="subcategory_id" autocomplete="off">
                @if ($errors->has('subcategory'))
                <span class="error">{{ $errors->first('subcategory') }}</span>
                @endif
            </div>
            <div class="col-md-6 mb-5">
                <label for="Priority" class="form-label">Priority</label>
                <div class="d-flex">
                    <div class="radio-btns">
                        <label for="" class="text-capitalize">high:</label>
                        <input type="radio" class="form-control btns-control" name="priority_id" id="high">
                    </div>
                    <div class="radio-btns">
                        <label for="" class="text-capitalize">medium:</label>
                        <input type="radio" class="form-control btns-control" name="priority_id" id="medium">
                    </div>
                    <div class="radio-btns">
                        <label for="" class="text-capitalize">low:</label>
                        <input type="radio" class="form-control btns-control" name="priority_id" id="low">
                    </div>
                    <span id="priority_id-error" class="error"></span>
                </div>
                @if ($errors->has('priority_id'))
                <span class="error">{{ $errors->first('priority_id') }}</span>
                @endif
            </div>
            <div class="col-md-6 mb-5">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" cols="40" rows="3" autocomplete="off"></textarea>
                @if ($errors->has('description'))
                <span class="error">{{ $errors->first('description') }}</span>
                @endif
            </div>
            <div class="col-md-6 mb-5">
                <label for="Category" class="form-label">Date</label>
                <input type="text" class="form-control" name="date" value="" id="datepicker" autocomplete="off">
                @if ($errors->has('date'))
                <span class="error">{{ $errors->first('date') }}</span>
                @endif
            </div>
            <div class="col-12 mt-3">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a class="btn btn-primary" href="{{ route('admin.category.index') }}">Cancel</a>
            </div>
        </form>
    </div>
</div>

@endsection
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Include jQuery Validation plugin -->
<!-- <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script> -->
@section('customJS')
<script>
    $(document).ready(function() {
        $("#datepicker").datepicker({
            dateFormat: 'yy-mm-dd',
            minDate: new Date(),
            maxDate: "+6M",
            onSelect: function(selectedDate) {
                var selectedDateObj = moment(selectedDate);
                var sixMonthsFromNow = moment().add(6, 'months');
                if (selectedDateObj.isAfter(sixMonthsFromNow)) {
                    alert("Please select a date within the next 6 months.");
                    $(this).val('');
                }
            }
        });
        // Validate the form using jQuery Validation
        $("#subcategoryForm").validate({
            rules: {
                subcategory: {
                    required: true,
                    minLength:2,
                    maxLength:25
                },
                priority_id: {
                    required: true
                },
                description: {
                    required: true,
                    minLength: 3,
                    maxLength:255
                },
                date: {
                    required: true,
                }
            },
            messages: {
                subcategory: {
                    required: "Please enter a category"
                },
                priority_id: {
                    required: "Please selecte the priority section"
                },
                description: {
                    required: "Please enter a description",
                    minLength: "Cannot enter less than 3 characters"
                },
                date: {
                    required: "Please select the date range"
                }
                // Add custom error messages for other fields here
            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('error');
                error.insertAfter(element);
            }
        });
    });
</script>
@endsection
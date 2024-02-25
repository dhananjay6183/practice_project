@extends('layouts.mainModule')
@section('content')

<div class="container py-3">
    <div class="d-flex user-btn-container">
        <h1>User Mnagement Details</h1>
        <a class="btn btn-success user-btn" href="javascript:void(0)" id="createNewProduct"> Create New User</a>
    </div>
    <table class="table table-bordered data-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>DOB</th>
                <th>Photo</th>
                <th width="280px">Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

<!-- boostrap company model -->
<div class="modal fade" id="user-modal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="UserManagement">User Management</h4>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.user.store') }}" id="UserForm" name="UserForm" class="form-horizontal" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter User Name" maxlength="50" required="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-12">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter user Email" maxlength="50" required="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Address</label>
                        <div class="col-sm-12">
                            <textarea name="address" id="address" cols="50" rows="4"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="dob" class="col-sm-2 control-label">Date of Birth</label>
                        <div class="col-sm-12">
                            <input type="date" class="form-control datepicker" id="dob" name="dob" placeholder="Enter user dob" maxlength="50" autocomplete="off" data-date-format="yyyy-mm-dd">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="image" class="col-sm-2 control-label">Image</label>
                        <div class="col-sm-12">
                            <input type="file" class="form-control" id="image_path" name="image_path" placeholder="insert image" maxlength="50" required="">
                        </div>
                    </div>

                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary" id="btn-save">Create user
                        </button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>
<!-- end bootstrap model -->

@endsection

@section('customJS')
<script>
    $(document).ready(function() {
        //show create modal
        $('body').on('click', '#createNewProduct', function() {
            $('#user-modal').modal('show');
        });

        //disable future date
        // $(".datepicker").datepicker({
        //     maxDate: 0,
        //     format: 'yyyy-mm-dd', // Set the date format to 'yyyy-mm-dd'
        //     autoclose: true,
        //     todayHighlight: true
        // });

        $('#UserForm').submit(function(event) {
            event.preventDefault();

            var formData = new FormData($(this)[0]);

            $.ajax({
                url: "{{ route('admin.user.store') }}",
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    console.log('Response:', response);
                    $('#user-modal').modal('hide');
                },
                error: function(xhr, status, error) {
                    console.log('error');
                }
            });

        });
    });
</script>
@endsection
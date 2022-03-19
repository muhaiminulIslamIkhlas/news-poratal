@extends('admin.layout.master')
@section('body')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Create News</h3>
                    </div>
                    <form id="quickForm">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" class="form-control" id="title"
                                       placeholder="Enter title">
                            </div>
                            <div class="form-group">
                                <label for="sort_description">Sort Description</label>
                                <textarea class="form-control" id="sort_description" name="sort_description"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="category_id">Category</label>
                                <select name="category_id" id="category_id" class="form-control">
                                    <option value="1">Dummy</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="sub_category_id">Sub Category</label>
                                <select name="sub_category_id" id="sub_category_id" class="form-control">
                                    <option value="1">Dummy</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="order">Order</label>
                                <input type="number" min="1" name="order" class="form-control" id="order"
                                       placeholder="Enter order">
                            </div>
                            <div class="form-group">
                                <label for="image">Image</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="image" id="image">
                                        <label class="custom-file-label" for="image">Choose image</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="type">Type</label>
                                <select name="type" id="type" class="form-control">
                                    <option value="Lead news">Lead news</option>
                                    <option value="Left first lead news">Left first lead news</option>
                                    <option value="Sub lead news">Sub lead news</option>
                                    <option value="General news" selected>General  news</option>
                                </select>
                            </div>
                        </div>
                        <div class="card-footer">
                            <input type="submit" class="btn btn-primary" value="Submit" />
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6">
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{asset('assets/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('assets/plugins/jquery-validation/additional-methods.min.js')}}"></script>
    <script>
        // $(function () {
        //     $.validator.setDefaults({
        //         submitHandler: function () {
        //             alert( "Form successful submitted!" );
        //         }
        //     });
        //     $('#quickForm').validate({
        //         rules: {
        //             email: {
        //                 required: true,
        //                 email: true,
        //             },
        //             password: {
        //                 required: true,
        //                 minlength: 5
        //             },
        //             terms: {
        //                 required: true
        //             },
        //         },
        //         messages: {
        //             email: {
        //                 required: "Please enter a email address",
        //                 email: "Please enter a valid email address"
        //             },
        //             password: {
        //                 required: "Please provide a password",
        //                 minlength: "Your password must be at least 5 characters long"
        //             },
        //             terms: "Please accept our terms"
        //         },
        //         errorElement: 'span',
        //         errorPlacement: function (error, element) {
        //             error.addClass('invalid-feedback');
        //             element.closest('.form-group').append(error);
        //         },
        //         highlight: function (element, errorClass, validClass) {
        //             $(element).addClass('is-invalid');
        //         },
        //         unhighlight: function (element, errorClass, validClass) {
        //             $(element).removeClass('is-invalid');
        //         }
        //     });
        // });
    </script>
@endsection

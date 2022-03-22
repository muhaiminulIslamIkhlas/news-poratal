@extends('admin.layout.master')
@section('styles')
    <link rel="stylesheet" href="{{asset("assets/plugins/summernote/summernote-bs4.min.css")}}">
    <link rel="stylesheet" href="{{asset("assets/plugins/codemirror/codemirror.css")}}">
    <link rel="stylesheet" href="{{asset("assets/plugins/codemirror/theme/monokai.css")}}">
    <link rel="stylesheet" href="{{asset("assets/plugins/simplemde/simplemde.min.css")}}">
    <link rel="stylesheet" href="{{asset("assets/plugins/select2/css/select2.min.css")}}">
@endsection
@section('body')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Create News</h3>
                    </div>
                    @if ($errors->any())
                        <ul class="mt-3">
                            @foreach ($errors->all() as $error)
                                <li class="text-danger">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <form id="quickForm" method="post" action="{{URL('admin/news/store')}}"
                          enctype="multipart/form-data">
                        @csrf
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
                                    <option value="">--Select One--</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="sub_category_id">Sub Category</label>
                                <select name="sub_category_id" id="sub_category_id" class="form-control">
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="order">Order</label>
                                <input type="number" min="1" name="order" class="form-control" id="order"
                                       placeholder="Enter order">
                            </div>
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" class="d-block" name="image" id="image"/>
                            </div>
                            <div class="form-group">
                                <label for="type">Type</label>
                                <select name="type" id="type" class="form-control">
                                    <option value="general" selected>General news</option>
                                    <option value="lead_news">Lead news</option>
                                    <option value="sub_lead_news">Sub lead news</option>
                                    <option value="second_lead">Second lead</option>
                                    <option value="latest">Latest</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="summernote">Details</label>
                                <textarea id="summernote" name="details">Place <em>some</em> <u>text</u> <strong>here</strong></textarea>
                            </div>
                            <div class="form-group">
                                <label for="ticker">Ticker</label>
                                <input type="text" name="ticker" class="form-control" id="ticker"
                                       placeholder="Enter ticker">
                            </div>
                            <div class="form-group">
                                <label for="representative">Representative</label>
                                <input type="text" name="representative" class="form-control" id="representative"
                                       placeholder="Enter representative">
                            </div>
                            <div class="form-group">
                                <label>Keyword</label>
                                <div class="select2-purple">
                                    <select class="select2" name="keyword[]" multiple="multiple"
                                            data-placeholder="Select keyword" data-dropdown-css-class="select2-purple"
                                            style="width: 100%;">
                                        @foreach($keyWords as $keyWord)
                                            <option value="{{$keyWord->name}}">{{$keyWord->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer">
                            <input type="submit" class="btn btn-primary" value="Submit"/>
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
    <script src="{{asset('assets/plugins/summernote/summernote-bs4.min.js')}}"></script>
    <script src="{{asset('assets/plugins/select2/js/select2.full.min.js')}}"></script>
    <script src="{{asset('assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>

    <script>
        $('#category_id').on('change', function () {
            let categoryID = $(this).val();
            if (categoryID) {
                $.ajax({
                    url: '{{URL('admin/news/subcategory/get-sub-category/')}}' + '/' + categoryID,
                    type: "GET",
                    data: {"_token": "{{ csrf_token() }}"},
                    dataType: "json",
                    success: function (data) {
                        if (data) {
                            $('#sub_category_id').empty();
                            $('#sub_category_id').append('<option hidden>Choose Sub-Category</option>');
                            $.each(data, function (key, item) {
                                $('select[name="sub_category_id"]').append('<option value="' + key + '">' + item.name + '</option>');
                            });
                        } else {
                            $('#sub_category_id').empty();
                        }
                    }
                });
            } else {
                $('#sub_category_id').empty();
            }
        })

        $('#summernote').summernote()
        $('.select2').select2()
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

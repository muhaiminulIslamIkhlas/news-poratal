@extends('admin.layout.master')
@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/plugins/summernote/summernote-bs4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/codemirror/codemirror.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/codemirror/theme/monokai.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/simplemde/simplemde.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">
@endsection
@section('body')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Create {{ $categoryName }} News</h3>
                    </div>
                    @if ($errors->any())
                        <ul class="mt-3">
                            @foreach ($errors->all() as $error)
                                <li class="text-danger">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <form id="quickForm" method="post" action="{{ URL('admin/news/store') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" class="form-control" id="title" placeholder="Enter title">
                            </div>
                            <div class="form-group">
                                <label for="sort_description">Sort Description</label>
                                <textarea id="sort_description"
                                    name="sort_description">Place <em>sort</em> <u>description</u> <strong>here</strong></textarea>
                            </div>
                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="date">Date Time</label>
                                    <input type="datetime-local" name="date" class="form-control" id="date"
                                        placeholder="Date Time">
                                </div>
                                <div class="form-group col-6">
                                    @if ($categoryId != 20)
                                        <label for="date">Timeline</label>
                                        <select class="form-control" name="timeline_id">
                                            <option value="">--Select one--</option>
                                            @foreach ($timelines as $timeline)
                                                <option value="{{ $timeline->id }}">{{ $timeline->name }}</option>
                                            @endforeach
                                        </select>
                                    @endif
                                </div>
                            </div>
                            <input type="hidden" id="category_id" name="category_id" value="{{ $categoryId }}" />
                            <input type="hidden" id="category_name" name="category_name" value="{{ $categoryName }}" />
                            @if ($categoryId != 18 && $categoryId != 19 && $categoryId != 20)
                                <div class="form-group">
                                    <label for="sub_category_id">Sub Category</label>
                                    <select name="sub_category_id" id="sub_category_id" class="form-control">
                                    </select>
                                </div>
                            @endif
                            <div class="form-group">
                                <label for="order">Order</label>
                                <input type="number" min="1" name="order" class="form-control" id="order"
                                    placeholder="Enter order">
                            </div>
                            <div class="form-group">
                                <label for="video_link">Video link</label>
                                <input type="text" min="1" name="video_link" class="form-control" id="video_link"
                                    placeholder="Enter link">
                            </div>
                            <div class="form-group">
                                <label for="google_drive_link">Google drive link</label>
                                <input type="text" name="google_drive_link" class="form-control" id="google_drive_link"
                                    placeholder="Enter link">
                            </div>
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" class="d-block" name="image" id="image" />
                            </div>
                            @if ($categoryId == 18 || $categoryId == 19)
                                <input type="hidden" name="type" value="general" />
                            @endif
                            @if ($categoryId != 18 && $categoryId != 19)
                                <div class="form-group">
                                    <label for="type">Type</label>
                                    <select name="type" id="type" class="form-control">
                                        <option value="general" selected>General news</option>
                                        <option value="lead_news">Lead news</option>
                                        <option value="sub_lead_news">Sub lead news</option>
                                        <option value="second_lead">Second lead</option>
                                        <option value="side_bar_news">Side bar news</option>
                                    </select>
                                </div>
                            @endif
                            <div class="form-group">
                                <label for="summernote">Details</label>
                                <textarea id="details" name="details">Place <em>some</em> <u>text</u> <strong>here</strong></textarea>
                            </div>
                            <div class="form-group">
                                <label for="ticker">Ticker</label>
                                <textarea id="ticker" name="ticker">Place <em>ticker</em> <strong>here</strong></textarea>
                            </div>
                            <div class="form-group">
                                <label for="ticker">Shoulder</label>
                                <textarea id="shoulder" name="shoulder">Place <em>shoulder</em> <strong>here</strong></textarea>
                            </div>
                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="representative">Representative</label>
                                    <input type="text" name="representative" class="form-control" id="representative"
                                        placeholder="Enter representative">
                                </div>
                                <div class="form-group col-6">
                                    <label>Keyword</label>
                                    <div class="select2-purple">
                                        <select class="select2" name="keyword[]" multiple="multiple"
                                            data-placeholder="Select keyword" data-dropdown-css-class="select2-purple"
                                            style="width: 100%;">
                                            @foreach ($keyWords as $keyWord)
                                                <option value="{{ $keyWord->id }}">{{ $keyWord->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-groupv col-4">
                                    <label for="division">Division</label>
                                    <select id="division" name="division" class="form-control">
                                        <option value="">Select division</option>
                                        @foreach ($divisions as $division)
                                            <option value="{{ $division->id }}">{{ $division->bn_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-4">
                                    <label for="district">District</label>
                                    <select id="district" name="district" class="form-control">
                                        <option value="">Select district</option>
                                    </select>
                                </div>
                                <div class="form-group col-4">
                                    <label for="upozilla">Upozilla</label>
                                    <select id="upozilla" name="upozilla" class="form-control">
                                        <option value="">Select upozilla</option>
                                    </select>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <p>SEO</p>
                                    <div class="form-group">
                                        <label for="title2">Title</label>
                                        <textarea id="title2" class="form-control" name="title2"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea id="description" class="form-control" name="description"></textarea>
                                        <!-- <textarea name="description" class="form-control" id="description"></textarea> -->
                                    </div>
                                    <div class="form-group">
                                        <label for="share_title">Share Title</label>
                                        <textarea name="share_title" class="form-control" id="share_title"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="page_img">Image</label>
                                        <input type="file" name="page_img" class="form-control" id="page_img" />
                                    </div>
                                    <div class="form-group">
                                        <label for="keywords">Keywords</label>
                                        <textarea name="keywords" class="form-control" id="keywords"></textarea>
                                    </div>
                                </div>
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
    <script src="{{ asset('assets/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery-validation/additional-methods.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>

    <script>
        let categoryID = $('#category_id').val();
        if (categoryID) {
            $.ajax({
                url: '{{ URL('admin/news/subcategory/get-sub-category/') }}' + '/' + categoryID,
                type: "GET",
                data: {
                    "_token": "{{ csrf_token() }}"
                },
                dataType: "json",
                success: function(data) {
                    if (data) {
                        $('#sub_category_id').empty();
                        $('#sub_category_id').append('<option value="">Choose Sub-Category</option>');
                        $.each(data, function(key, item) {
                            $('select[name="sub_category_id"]').append('<option value="' + item.id +
                                '">' +
                                item.name + '</option>');
                        });
                    } else {
                        $('#sub_category_id').empty();
                    }
                }
            });
        } else {
            $('#sub_category_id').empty();
        }
        $('#division').on('change', function() {
            let divisionID = $(this).val();
            if (divisionID) {
                $.ajax({
                    url: '{{ URL('admin/news/get-district') }}' + '/' + divisionID,
                    type: "GET",
                    data: {
                        "_token": "{{ csrf_token() }}"
                    },
                    dataType: "json",
                    success: function(data) {
                        if (data) {
                            $('#district').empty();
                            $('#district').append('<option value="">Choose District</option>');
                            $.each(data, function(key, item) {
                                $('select[name="district"]').append('<option value="' + item
                                    .id + '">' + item.bn_name + '</option>');
                            });
                        } else {
                            $('#district').empty();
                        }
                    }
                });
            } else {
                $('#sub_category_id').empty();
            }
        })

        upozilla

        $('#district').on('change', function() {
            let districtID = $(this).val();
            if (districtID) {
                $.ajax({
                    url: '{{ URL('admin/news/get-upozilla') }}' + '/' + districtID,
                    type: "GET",
                    data: {
                        "_token": "{{ csrf_token() }}"
                    },
                    dataType: "json",
                    success: function(data) {
                        if (data) {
                            $('#upozilla').empty();
                            $('#upozilla').append('<option value="">Choose upozilla</option>');
                            $.each(data, function(key, item) {
                                $('select[name="upozilla"]').append('<option value="' + item
                                    .id + '">' + item.bn_name + '</option>');
                            });
                        } else {
                            $('#upozilla').empty();
                        }
                    }
                });
            } else {
                $('#sub_category_id').empty();
            }
        })

        $('#sort_description').summernote()
        $('#details').summernote()
        $('#ticker').summernote()
        $('#shoulder').summernote()
        $('.select2').select2()
    </script>
@endsection

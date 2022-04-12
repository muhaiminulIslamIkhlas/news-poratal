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
                        <h3 class="card-title">Edit News</h3>
                    </div>
                    @if ($errors->any())
                        <ul class="mt-3">
                            @foreach ($errors->all() as $error)
                                <li class="text-danger">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <form id="quickForm" method="post" action="{{ URL('admin/news/update') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $news->id }}" />
                        <input type="hidden" name="categoryName" value="{{ $categoryName }}" />
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" value="{{ $news->title }}" class="form-control"
                                    id="title" placeholder="Enter title">
                            </div>
                            <div class="form-group">
                                <label for="sort_description">Sort Description</label>
                                <textarea id="sort_description" name="sort_description">{!! $news->sort_description !!}</textarea>
                            </div>
                            <div class="row">
                            <div class="form-group col-6">
                                <label for="date">Date Time</label>
                                <input type="datetime-local" value="{{ date('Y-m-d\TH:i:s', strtotime($news->date)) }}"
                                    name="date" class="form-control" id="date" placeholder="Date Time">
                            </div>
                            <div class="form-group col-6">
                                <label for="date">Timeline</label>
                                <select class="form-control" name="timeline_id">
                                    <option value="">--Select one--</option>
                                    @foreach ($timelines as $timeline)
                                        <option value="{{ $timeline->id }}" <?php if($news->timeline_id == $timeline->id){echo 'selected';} ?>>{{ $timeline->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                            <input type="hidden" id="category_id" name="category_id" value="{{ $news->category_id }}" />
                            {{-- <input type="hidden" id="category_name" name="category_name" value="{{ $categoryName }}" /> --}}
                            <div class="form-group">
                                <label for="sub_category_id">Sub Category</label>
                                <select name="sub_category_id" id="sub_category_id" class="form-control">
                                    @if ($news->sub_category_id)
                                        <option value="{{ $news->sub_category_id }}">{{ $news->subCategory->name }}
                                        </option>
                                    @endif
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="order">Order</label>
                                <input type="number" min="1" name="order" value="{{ $news->order }}"
                                    class="form-control" id="order" placeholder="Enter order">
                            </div>
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" class="d-block" name="image" id="image" />
                            </div>
                            <div class="form-group">
                                <label for="type">Type</label>
                                <select name="type" id="type" class="form-control">
                                    <option value="general" <?php if ($news->type == 'general') {
    echo 'selected';
} ?>>General news</option>
                                    <option value="lead_news" <?php if ($news->type == 'lead_news') {
    echo 'selected';
} ?>>Lead news</option>
                                    <option value="sub_lead_news" <?php if ($news->type == 'sub_lead_news') {
    echo 'selected';
} ?>>Sub lead news</option>
                                    <option value="second_lead" <?php if ($news->type == 'second_lead') {
    echo 'selected';
} ?>>Second lead</option>
                                    <option value="side_bar_news" <?php if ($news->type == 'side_bar_news') {
    echo 'selected';
} ?>>Side bar news</option>
                                    <option value="latest" <?php if ($news->type == 'latest') {
    echo 'selected';
} ?>>Latest</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="summernote">Details</label>
                                <textarea id="details" name="details">{!! $news->details->details !!}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="ticker">Ticker</label>
                                <textarea id="ticker" name="ticker">{!! $news->details->ticker !!}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="ticker">Shoulder</label>
                                <textarea id="shoulder" name="shoulder">{!! $news->details->shoulder !!}</textarea>
                            </div>
                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="representative">Representative</label>
                                    <input type="text" value="{{ $news->details->representative }}" name="representative"
                                        class="form-control" id="representative" placeholder="Enter representative">
                                </div>
                                <div class="form-group col-6">
                                    <label>Keyword</label>
                                    <div class="select2-purple">
                                        <select class="select2" id="keywordSelect" name="keyword[]"
                                            multiple="multiple" data-placeholder="Select keyword"
                                            data-dropdown-css-class="select2-purple" style="width: 100%;">
                                            @foreach ($keyWords as $keyWord)
                                                <option value="{{ $keyWord->name }}"
                                                    @if (in_array($keyWord->name, $newsKeywords)) selected @endif>
                                                    {{ $keyWord->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" id="disVal" value="{{ $news->region->district }}" />
                            <input type="hidden" id="upoVal" value="{{ $news->region->upozilla }}" />
                            <div class="row">
                                <div class="form-groupv col-4">
                                    <label for="division">Division</label>
                                    <select id="division" name="division" class="form-control">
                                        <option value="">Select division</option>
                                        @foreach ($divisions as $division)
                                            <option value="{{ $division->id }}" <?php if ($news->region->division == $division->id) {
    echo 'selected';
} ?>>
                                                {{ $division->bn_name }}</option>
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
        var jk = 0;
        $('#sub_category_id').on('click', function() {
            if (jk < 1) {
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
                                $('#sub_category_id').append(
                                    '<option value="">Choose Sub-Category</option>');
                                $.each(data, function(key, item) {
                                    $('select[name="sub_category_id"]').append(
                                        '<option value="' +
                                        item.id + '">' +
                                        item.name + '</option>');
                                });
                            } else {
                                $('#sub_category_id').empty();
                            }
                        }
                    });
                    jk += 1;
                } else {
                    $('#sub_category_id').empty();
                }
            }
        });

        var division = $('#division').val();
        var district = $('#disVal').val();
        var upozilla = $('#upoVal').val();

        getDistrict(division)
        getUpozilla(district)

        function getDistrict(divisionID) {
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
                                let select = '';
                                if (item.id == district) {
                                    select = 'selected'
                                }
                                $('select[name="district"]').append('<option value="' + item
                                    .id + '"' + select + '>' + item.bn_name + '</option>');
                            });
                        } else {
                            $('#district').empty();
                        }
                    }
                });
            } else {
                $('#district').empty();
            }
        }

        function getUpozilla(districtID) {
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
                                let select = '';
                                if (item.id == upozilla) {
                                    select = 'selected'
                                }
                                $('select[name="upozilla"]').append('<option value="' + item
                                    .id + '"' + select + '>' + item.bn_name + '</option>');
                            });
                        } else {
                            $('#upozilla').empty();
                        }
                    }
                });
            } else {
                $('#upozilla').empty();
            }
        }



        $('#division').on('change', function() {
            let divisionID = $(this).val();
            $('#upozilla').empty();
            getDistrict(divisionID)
        })

        $('#district').on('change', function() {
            let districtID = $(this).val();
            getUpozilla(districtID);
        })

        $('#sort_description').summernote()
        $('#details').summernote()
        $('#ticker').summernote()
        $('#shoulder').summernote()
        $('.select2').select2()
    </script>
@endsection

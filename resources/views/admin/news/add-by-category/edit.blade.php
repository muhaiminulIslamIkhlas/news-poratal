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
                            <div class="card">
                                <div class="card-body">
                                    <h5 style="display: block;">Category</h5>
                                    <div class="row" style="padding-left: 10px;">
                                        @foreach ($categories as $cat)
                                            <div class="form-check" style="margin-right: 10px;">
                                                <input class="form-check-input category_check" type="checkbox"
                                                    value=" {{ $cat->id }}" name="category[]" id="latest"
                                                    <?php if (in_array($cat->id, $newsCategory)) {
                                                        echo 'checked';
                                                    } ?>>
                                                <label class="form-check-label" for="latest">
                                                    {{ $cat->name }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                    <h5 style="display: block; margin-top:20px;">Sub Category</h5>
                                    <div class="row" id="sub_category_new" style="padding-left: 10px;">

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-8">
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input type="text" name="title" value="{{ $news->title }}" class="form-control"
                                            id="title" placeholder="Enter title">
                                    </div>
                                    <div class="form-group">
                                        <label for="sort_description">Sort Description</label>
                                        <textarea id="sort_description" name="sort_description">{!! $news->sort_description !!}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="summernote">Details</label>
                                        <textarea id="details" name="details">{!! $news->details->details !!}</textarea>
                                    </div>

                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="date">Date Time</label>
                                        <input type="datetime-local"
                                            value="{{ date('Y-m-d\TH:i:s', strtotime($news->date)) }}" name="date"
                                            class="form-control" id="date" placeholder="Date Time">
                                    </div>

                                    <div class="form-group">
                                        @if ($categoryId != 20)
                                            <label for="date">Timeline</label>
                                            <select class="form-control" name="timeline_id">
                                                <option value="">--Select one--</option>
                                                @foreach ($timelines as $timeline)
                                                    <option value="{{ $timeline->id }}" <?php if ($news->timeline_id == $timeline->id) {
                                                        echo 'selected';
                                                    } ?>>
                                                        {{ $timeline->name }}</option>
                                                @endforeach
                                            </select>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="order">Order</label>
                                        <input type="number" min="1" name="order" value="{{ $news->order }}"
                                            class="form-control" id="order" placeholder="Enter order">
                                    </div>
                                    <div class="form-group">
                                        <label for="video_link">Video link</label>
                                        <input type="text" value="{{ $news->details->video_link ?? '' }}"
                                            name="video_link" class="form-control" id="video_link"
                                            placeholder="Enter link">
                                    </div>
                                    <div class="form-group">
                                        <label for="google_drive_link">Google drive link</label>
                                        <input type="text" value="{{ $news->details->google_drive_link ?? '' }}"
                                            name="google_drive_link" class="form-control" id="google_drive_link"
                                            placeholder="Enter link">
                                    </div>
                                    <div class="form-group">
                                        <label for="audio_link">Audio link</label>
                                        <input type="text" name="audio_link"
                                            value="{{ $news->details->audio_link ?? '' }}" class="form-control"
                                            id="audio_link" placeholder="Enter link">
                                    </div>
                                    <div class="row" style="padding-left: 10px;">
                                        <div class="form-check" style="margin-right: 10px;">
                                            <input class="form-check-input" type="checkbox" <?php if ($news->latest) {
                                                echo 'checked';
                                            } ?> value="1"
                                                name="latest" id="latest">
                                            <label class="form-check-label" for="latest">
                                                Latest news
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" <?php if ($news->news_marquee) {
                                                echo 'checked';
                                            } ?>
                                                name="news_marquee" id="news_marquee">
                                            <label class="form-check-label" for="news_marquee">
                                                News Marquee
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="image">Image</label>
                                        <input type="file" class="d-block" name="image" id="image" />
                                    </div>
                                    <input type="hidden" id="category_id" name="category_id"
                                        value="{{ $news->category_id }}" />
                                    {{-- <input type="hidden" id="category_name" name="category_name" value="{{ $categoryName }}" /> --}}
                                    {{-- @if ($categoryId != 18 && $categoryId != 19 && $categoryId != 20)
                                        <div class="form-group">
                                            <label for="sub_category_id">Sub Category</label>
                                            <select name="sub_category_id" id="sub_category_id" class="form-control">
                                                @if ($news->sub_category_id)
                                                    <option value="{{ $news->sub_category_id }}">
                                                        {{ $news->subCategory->name }}
                                                    </option>
                                                @endif
                                            </select>
                                        </div>
                                    @endif --}}
                                    @if ($categoryId == 18 || $categoryId == 19)
                                        <input type="hidden" name="type" value="general" />
                                    @endif
                                    @if ($categoryId != 18 && $categoryId != 19)
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
                                            </select>
                                        </div>
                                    @endif
                                    <div class="form-group">
                                        <label for="representative">Representative</label>
                                        <input type="text" value="{{ $news->details->representative }}"
                                            name="representative" class="form-control" id="representative"
                                            placeholder="Enter representative">
                                    </div>
                                    <div class="form-group">
                                        <label>Keyword</label>
                                        <div class="select2-purple">
                                            <select class="select2" id="keywordSelect" name="keyword[]"
                                                multiple="multiple" data-placeholder="Select keyword"
                                                data-dropdown-css-class="select2-purple" style="width: 100%;">
                                                @foreach ($keyWords as $keyWord)
                                                    <option value="{{ $keyWord->id }}"
                                                        @if (in_array($keyWord->id, $newsKeywords)) selected @endif>
                                                        {{ $keyWord->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="ticker">Ticker</label>
                                <textarea id="ticker" name="ticker">{!! $news->details->ticker !!}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="ticker">Shoulder</label>
                                <textarea id="shoulder" name="shoulder">{!! $news->details->shoulder !!}</textarea>
                            </div>

                            <input type="hidden" id="disVal" value="{{ $news->region->district ?? '' }}" />
                            <input type="hidden" id="upoVal" value="{{ $news->region->upozilla ?? '' }}" />
                            <div class="row">
                                <div class="form-groupv col-4">
                                    <label for="division">Division</label>
                                    <select id="division" name="division" class="form-control">
                                        <option value="">Select division</option>
                                        @foreach ($divisions as $division)
                                            <option value="{{ $division->id }}" <?php $divisionCheck = $news->region->division ?? '';
                                            if ($divisionCheck == $division->id) {
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
                            <div class="card">
                                <div class="card-body">
                                    <p>SEO</p>
                                    <div class="form-group">
                                        <label for="title2">Title</label>
                                        <textarea id="title2" class="form-control" name="title2">{{ $seo->title ?? '' }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea id="description" class="form-control" name="description">{{ $seo->description ?? '' }}</textarea>
                                        <!-- <textarea name="description" class="form-control" id="description"></textarea> -->
                                    </div>
                                    <div class="form-group">
                                        <label for="share_title">Share Title</label>
                                        <textarea name="share_title" class="form-control" id="share_title">{{ $seo->share_title ?? '' }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="page_img">Image</label>
                                        <input type="file" name="page_img" class="form-control" id="page_img" />
                                    </div>
                                    <div class="form-group">
                                        <label for="keywords">Keywords</label>
                                        <textarea name="keywords" class="form-control" id="keywords">{{ $seo->title ?? '' }}</textarea>
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
        let newsSub = {!! json_encode($newsSubCategory) !!}
        $('.category_check').on('change', function() {
            var arr = $('.category_check:checked').map(function() {
                return this.value;
            }).get();

            $.ajax({
                url: '{{ URL('admin/news/subcategory/get-sub-category-post/') }}',
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    data: JSON.stringify(arr)
                },
                dataType: "json",
                success: function(data) {
                    if (data) {
                        $('#sub_category_new').empty();
                        console.log(data)
                        $.each(data, function(key, item) {
                            console.log(item)
                            $('#sub_category_new').append(
                                '<div class="form-check sub_category"  style="margin-right: 10px;"><input id="' +
                                item.id +
                                '" class="form-check-input category_check" type="checkbox" value="' +
                                item.id +
                                '" name="sub_category[]"><label class="form-check-label">' +
                                item.name + '</label></div>'
                            );
                        });

                        $('#' + newsSub[0]).attr('checked', 'checked');
                    } else {
                        $('#sub_category_id').empty();
                    }
                }
            });
        })

        var arr = $('.category_check:checked').map(function() {
            return this.value;
        }).get();

        $.ajax({
            url: '{{ URL('admin/news/subcategory/get-sub-category-post/') }}',
            type: "POST",
            data: {
                "_token": "{{ csrf_token() }}",
                data: JSON.stringify(arr)
            },
            dataType: "json",
            success: function(data) {
                if (data) {
                    $('#sub_category_new').empty();
                    console.log(data)
                    $.each(data, function(key, item) {
                        console.log(item)
                        $('#sub_category_new').append(
                            '<div class="form-check sub_category"  style="margin-right: 10px;"><input id="' +
                            item.id +
                            '" class="form-check-input category_check" type="checkbox" value="' +
                            item.id +
                            '" name="sub_category[]"><label class="form-check-label">' +
                            item.name + '</label></div>'
                        );
                    });

                    $('#' + newsSub[0]).attr('checked', 'checked');
                } else {
                    $('#sub_category_id').empty();
                }
            }
        });
    </script>
@endsection

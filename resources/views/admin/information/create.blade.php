@extends('admin.layout.master')
@section('title')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Add New Information</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">News</li>
                <li class="breadcrumb-item active">Information</li>
            </ol>
        </div>
    </div>
</div><!-- /.container-fluid -->
@endsection()
@section('body')

<div class="container-fluid">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
        <!-- jquery validation -->
        <div class="card card-primary">
            <div class="card-header">
            <h3 class="card-title">Create New Information</h3>
            </div>
            @if ($errors->any())
                <ul class="mt-3">
                    @foreach ($errors->all() as $error)
                        <li class="text-danger">{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <!-- /.card-header -->
            <!-- form start -->
            <form id="quickForm" method="POST" action="{{Url('/admin/information/store')}}">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="info_key">Information Key</label>
                        <select name="info_key" class="form-control">
                            <option value="">Please Select</option>
                            <option value="total_affected_bd">total_affected_bd</option>
                            <option value="total_recover_bd">total_recover_bd</option>
                            <option value="total_death_bd">total_death_bd</option>
                            <option value="total_affected_int">total_affected_int</option>
                            <option value="total_recover_int">total_recover_int</option>
                            <option value="total_death_int">total_death_int</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="info_value">Information Value</label>
                        <input type="text" name="info_value" class="form-control" id="info_value" placeholder="Information Value">
                    </div>
                    <div class="form-group">
                        <label for="info_key">Date Time</label>
                        <input type="datetime-local" name="date_time" class="form-control" id="info_key" placeholder="Date">
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <input type="submit" class="btn btn-primary" value="Save">
                </div>
            </form>
        </div>
        <!-- /.card -->
        </div>
        <!--/.col (left) -->
        <!-- right column -->
        <div class="col-md-6">

        </div>
        <!--/.col (right) -->
    </div>
    <!-- /.row -->
</div><!-- /.container-fluid -->
@endsection()

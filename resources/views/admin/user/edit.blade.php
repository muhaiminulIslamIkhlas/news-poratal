@extends('admin.layout.master')
@section('title')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Edit User</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">News</li>
                <li class="breadcrumb-item active">User</li>
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
            <h3 class="card-title">User</h3>
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
            <form id="quickForm" method="POST" action="{{Url('/admin/user/update')}}">
                @csrf
                <input type="hidden" name="id" value="{{$user->id}}">
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">User Name</label>
                        <input type="text" name="name" class="form-control" value="{{$user->name}}" id="name" placeholder="User Name">
                    </div>
                    <div class="form-group">
                        <label for="name">User Email</label>
                        <input type="email" name="email" class="form-control" value="{{$user->email}}" id="email" disabled placeholder="User Email">
                    </div>
                    <div class="form-group">
                        <label for="name">Role</label>
                        <select name="role" class="form-control">
                            <option value="">--Choose one--</option>
                            <option value="admin" <?php if($user->role == 'admin'){echo 'selected';} ?>>admin</option>
                            <option value="publisher" <?php if($user->role == 'publisher'){echo 'selected';} ?> >publisher</option>
                            <option value="representative" <?php if($user->role == 'representative'){echo 'selected';} ?> >representative</option>
                            <option value="developer" <?php if($user->role == 'developer'){echo 'selected';} ?> >developer</option>
                            <option value="editor" <?php if($user->role == 'editor'){echo 'selected';} ?> >editor</option>
                            <option value="desk-reporter" <?php if($user->role == 'desk-reporter'){echo 'selected';} ?> >desk-reporter</option>
                        </select>
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

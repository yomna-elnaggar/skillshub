@extends('admin.layout')

@section('main')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> Add Admins</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url("dashboard")}}">Home</a></li>
              <li class="breadcrumb-item active"><a href="{{url("dashboard/admins")}}">  Admins</a></li>
              <li class="breadcrumb-item active"> Add Admins</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    @include('admin.inc.message')
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12 pb-3">
          @include('admin.inc.errors')
            <form   action="{{url("dashboard/admins/store")}}" method= "POST" >
            @csrf
            
                <div class="card-body">
                    
                    <div class="form-group">
                        <label for="exampleInputBorder">Name</label>
                        <input type="text" class="form-control form-control-border" name="name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputBorder">Email</label>
                        <input type="email" class="form-control form-control-border" name="email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputBorder">password</label>
                        <input type="password" class="form-control form-control-border" name="password">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputBorder">confirme password</label>
                        <input type="password" class="form-control form-control-border" name="password_confirmation">
                    </div>

                    
                    <div class="form-group">
                        <label>Role</label>
                        <select class="custom-select rounded-0" name="role_id">
                        @foreach($roles as $role)
                        <option value="{{$role->id}}" >{{$role->name}}</option>
                        @endforeach
                    </select>
                    </div>

                   

                    <button type="submit"  class="btn btn-success"  >submit</button>
                    <a href="{{url()->previous()}}" class="btn btn-sm btn-primary" > Back</a>
                </div>
            </form>

            </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
@endsection
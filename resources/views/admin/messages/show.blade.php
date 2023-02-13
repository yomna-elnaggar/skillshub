
@extends('admin.layout')

@section('main')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">message</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url("dashboard")}}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{url("dashboard/exams")}}">Messages</a></li>
              <li class="breadcrumb-item active">message</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="card">
        <div class="card-header">
        <h3 class="card-title">message</h3>
        </div>

        <div class="card-body p-0">
        <table class="table table-sm">
        
            <tbody>
                <tr>
                    <th> Name </th>
                    <td>{{$message->name}}</td>
                </tr>
                <tr>
                    <th> Email</th>
                    <td>{{$message->email}}</td>
                </tr>
                <tr>
                    <th> subject</th>
                    <td>{{$message->subject ?? ".."}}</td>
                </tr>
                <tr>
                    <th> body</th>
                    <td>{{$message->bady?? "..."}}</td>
                </tr>
                
            </tbody>
        </table>
        </div> </div>
     
        
    <!-- /.content-header -->
    @include('admin.inc.message')
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12 pb-3">
          <div class="col-sm-6">
            <h2 class="m-0 text-dark">send response</h2>
          </div>
          @include('admin.inc.errors')
            <form   action="{{url("dashboard/messages/response/$message->id")}}" method= "POST" >
            @csrf
            
                <div class="card-body">
                    
                    <div class="form-group">
                        <label for="exampleInputBorder">Title</label>
                        <input type="text" class="form-control form-control-border" name="title">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputBorder">Body</label>
                        <input type="text" class="form-control form-control-border" name="body">
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
  </div>
  <!-- /.content-wrapper -->

 @endsection
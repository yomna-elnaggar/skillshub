
@extends('admin.layout')

@section('main')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Students</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url("dashboard")}}">Home</a></li>
              <li class="breadcrumb-item active">Students</li>
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
          <div class="col-12">

          <div class="card">
            <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
                <div class="card-header">
                  <h3 class="card-title">All Students</h3>
                  <div class="card-tools">
                   {{--<a href="{{url("dashboard/exams/create")}}" class="btn btn-sm btn-primary" >
                      add new
                      </a>--}}
                  </div>
                </div>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>verifaied</th> 
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($students as $student)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$student->name}}</td>
                        <td>{{$student->email}}</td>
                        <td>
                          {{--@if($exam->active)
                            <span class="badge badge-pill badge-success">yes</span>
                           @else @endif--}}
                            <span class="badge badge-pill badge-danger">no</span>
                          
                        </td>
                        <td>
                        <a href="{{url("dashboard/students/show-score/$student->id")}}" class="btn btn-sm btn-success update-btn"><i class="fas fa-percent"></i></a>
                        
                        </td>
                    </tr>
                  
                    @endforeach
                </tbody>
            </table>
           {{$students->links()}} 
            </div>

    </div>


          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>

 @endsection
 

 @section('script')
  
 <script>
 </script>
 @endsection
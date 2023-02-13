
@extends('admin.layout')

@section('main')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Exam</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url("dashboard")}}">Home</a></li>
              <li class="breadcrumb-item active">Exams</li>
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
                  <h3 class="card-title">All Exams</h3>
                  <div class="card-tools">
                    <a href="{{url("dashboard/exams/create")}}" class="btn btn-sm btn-primary" >
                      add new
                      </a>
                  </div>
                </div>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name(En)</th>
                        <th>Name(Ar)</th>
                        <th>Image</th>
                        <th>Category</th>
                        <th>Active</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($exams as $exam)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$exam->name('en')}}</td>
                        <td>{{$exam->name('ar')}}</td>
                        <td>
                            <img src="{{asset("uploads/$exam->img")}}" height ="50px"> </td>
                        <td>{{$exam->skill->name('en')}}</td>
                        <td>
                          @if($exam->active)
                            <span class="badge badge-pill badge-success">yes</span>
                           @else
                            <span class="badge badge-pill badge-danger">no</span>
                          @endif
                        </td>
                        <td>
                        <a href="{{url("dashboard/exams/show/$exam->id")}}" class="btn btn-sm btn-success update-btn"><i class="fas fa-eye"></i></a>
                        <a href="{{url("dashboard/exams/show/$exam->id/question")}}" class="btn btn-sm btn-primary update-btn"><i class="fas fa-question"></i></a>
                        <a href="{{url("dashboard/exams/edit/$exam->id")}}" class="btn  btn-sm btn-default update-btn"><i class="fas fa-edit"></i></a>
                        <a href="{{url("dashboard/exams/delete/$exam->id")}}" class="btn btn-sm btn-danger"><i class="fas fa-regular fa-trash"></i></a>
                        <a href="{{url("dashboard/exams/toggle/$exam->id")}}" class="btn btn-sm btn-secondary"><i class="fas fa-toggle-on"></i></a>
                        
                        
                        </td>
                    </tr>
                  
                    @endforeach
                </tbody>
            </table>
           {{$exams->links()}} 
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
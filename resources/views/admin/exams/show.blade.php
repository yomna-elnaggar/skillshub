
@extends('admin.layout')

@section('main')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">{{$exam->name('en')}}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url("dashboard")}}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{url("dashboard/exams")}}">Exams</a></li>
              <li class="breadcrumb-item active">{{$exam->name('en')}}</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="card">
        <div class="card-header">
        <h3 class="card-title">Exam</h3>
        </div>

        <div class="card-body p-0">
        <table class="table table-sm">
        
            <tbody>
                <tr>
                    <th> Name (en)</th>
                    <td>{{$exam->name('en')}}</td>
                </tr>
                <tr>
                    <th> Name (ar)</th>
                    <td>{{$exam->name('ar')}}</td>
                </tr>
                <tr>
                    <th> descreption</th>
                    <td>{{$exam->desc}}</td>
                </tr>
                <tr>
                    <th> image</th>
                    <td>
                        <img src="{{asset("uploads/$exam->img")}}" height="50px"></td>
                </tr>
                <tr>
                    <th> questions_no</th>
                    <td>{{$exam->questions_no}}</td>
                </tr>
                
                <tr>
                    <th> difficulty</th>
                    <td>{{$exam->difficulty}}</td>
                </tr>
                <tr>
                    <th> duration</th>
                    <td>{{$exam->duration_minss}}</td>
                </tr>
                <tr>
                    <th> active</th>
                    <td> @if($exam->active)
                            <span class="badge badge-pill badge-success">yes</span>
                           @else
                            <span class="badge badge-pill badge-danger">no</span>
                          @endif</td>
                </tr>
                <tr>
                    <th> skill</th>
                    <td>{{$exam->skill->name('en')}}</td>
                </tr>
                
            </tbody>
        </table>
        </div> </div>
        <a href="{{url("dashboard/exams/show/$exam->id/question")}}" class="btn btn-sm btn-primary update-btn">Show Question</a>
        <a href="{{url()->previous()}}" class="btn btn-sm btn-primary" > Back</a>
   
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 @endsection
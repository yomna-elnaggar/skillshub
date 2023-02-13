
@extends('admin.layout')

@section('main')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">{{$student->name}}-score</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url("dashboard")}}">Home</a></li>
              <li class="breadcrumb-item active">{{$student->name}}</li>
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
                  <h3 class="card-title">{{$student->name}}</h3>
                  <div class="card-tools">
                   {{--<a href="{{url("dashboard/exams/create")}}" class="btn btn-sm btn-primary" >
                      add new
                      </a>--}}
                  </div>
                </div>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Exams</th>
                        <th>Scoer</th>
                        <th>Time_mins</th>
                        <th>At</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($exams as $exam)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$exam->name('en')}}</td>
                        <td>{{$exam->pivot->score}}</td>
                        <td>{{$exam->pivot->time_mins}}</td>
                        <td>{{$exam->pivot->created_at}}</td>
                        <td>{{$exam->pivot->status}}</td>
                        <td>
                          @if($exam->pivot->status=="closed")
                          <a href="{{url("dashboard/students/open-exam/$student->id/$exam->id")}}" class="btn btn-sm btn-success update-btn">
                          <i class="fas fa-lock-open"></i></a>
                        
                           @else 
                           <a href="{{url("dashboard/students/close-exam/$student->id/$exam->id")}}" class="btn btn-sm btn-danger update-btn"><i class="fas fa-lock"></i></a>
                        
                          @endif
                        </td>
                       
                    </tr>
                  
                    @endforeach
                </tbody>
            </table>
          
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
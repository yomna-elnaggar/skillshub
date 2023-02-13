@extends('admin.layout')

@section('main')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> Create Exam</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url("dashboard")}}">Home</a></li>
              <li class="breadcrumb-item active"><a href="{{url("dashboard/exam")}}">Exams</a></li>
              <li class="breadcrumb-item active">Add New</li>
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
            <form   action="{{url("dashboard/exams/store_question/{$exam_id}")}}" method= "POST" enctype="multipart/form-data">
            @csrf
            
                <div class="card-body">
                  @for($i =1 ; $i <= $questions_no ;$i++)
                    <h4>Question{{$i}}</h4>
                    <div class="form-group">
                        <label for="exampleInputBorder">Title</label>
                        <input type="text" class="form-control form-control-border" name="title[]">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputBorder">Right_ans</label>
                        <input type="text" class="form-control form-control-border" name="right_ans[]">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputBorder">option_1</label>
                        <input type="text" class="form-control form-control-border" name="option_1s[]">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputBorder">option_2</label>
                        <input type="text" class="form-control form-control-border" name="option_2s[]">
                    </div>
                    
                    <div class="form-group">
                        <label for="exampleInputBorder">option_3</label>
                        <input type="text" class="form-control form-control-border" name="option_3s[]">
                    </div>
                    
                    <div class="form-group">
                        <label for="exampleInputBorder">option_4</label>
                        <input type="text" class="form-control form-control-border" name="option_4s[]">
                    </div>
                    @endfor
                    

                    <button type="submit"  class="btn btn-success"  >submit</button>
                   
                </div>
            </form>
            </div>
            </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
@endsection
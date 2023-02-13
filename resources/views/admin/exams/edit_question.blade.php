@extends('admin.layout')

@section('main')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> edit question</h1>
          </div><!-- /.col --> 
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url("dashboard")}}">Home</a></li>
              <li class="breadcrumb-item active"><a href="{{url("dashboard/exam")}}">Exams</a></li>
              <li class="breadcrumb-item active">edit question</li>

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
            <form   action="{{url("dashboard/exams/update_question/{$exam->id}/{$question->id}")}}" method= "POST" enctype="multipart/form-data">
            @csrf
            
                <div class="card-body">
              
                   
                    <div class="form-group">
                        <label for="exampleInputBorder">Title</label>
                        <input type="text" class="form-control form-control-border" name="title" value="{{$question->title}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputBorder">Right_ans</label>
                        <input type="text" class="form-control form-control-border" name="right_ans" value="{{$question->right_ans}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputBorder">option_1</label>
                        <input type="text" class="form-control form-control-border" name="option_1" value="{{$question->option_1}}">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputBorder">option_2</label>
                        <input type="text" class="form-control form-control-border" name="option_2" value="{{$question->option_2}}">
                    </div>
                    
                    <div class="form-group">
                        <label for="exampleInputBorder">option_3</label>
                        <input type="text" class="form-control form-control-border" name="option_3" value="{{$question->option_3}}">
                    </div>
                    
                    <div class="form-group">
                        <label for="exampleInputBorder">option_4</label>
                        <input type="text" class="form-control form-control-border" name="option_4" value="{{$question->option_4}}">
                    </div>
                  
                    

                    <button type="submit"  class="btn btn-success"  >submit</button>
                   
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
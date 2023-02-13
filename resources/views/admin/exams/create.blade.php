@extends('admin.layout')

@section('main')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> Add New Exam</h1>
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
            <form   action="{{url("dashboard/exams/store")}}" method= "POST" enctype="multipart/form-data">
            @csrf
            
                <div class="card-body">
                    <h4>Input</h4>
                    <div class="form-group">
                        <label for="exampleInputBorder">Name(En)</label>
                        <input type="text" class="form-control form-control-border" name="name_en">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputBorder">Name(Ar)</label>
                        <input type="text" class="form-control form-control-border" name="name_ar">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputBorder">Desctiption(En)</label>
                        <input type="text" class="form-control form-control-border" name="desc_en">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputBorder">Desctiption(Ar)</label>
                        <input type="text" class="form-control form-control-border" name="desc_ar">
                    </div>
                    
                    <div class="form-group">
                        <label>Skill</label>
                        <select class="custom-select rounded-0" name="skill_id">
                        @foreach($skills as $skill)
                        <option value="{{$skill->id}}" >{{$skill->name('en')}}</option>
                        @endforeach
                    </select>
                    </div>

                    <div class="form-group" >
                        <label>Image</label>
                        <div class="input-group">
                        <div class="custom-file">
                        <input type="file" class="custom-file-input" name="img"  >
                        <label class="custom-file-label" >Choose file</label>
                        </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputBorder">Questions_no</label>
                        <input type="text" class="form-control form-control-border" name="questions_no">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputBorder">difficulty</label>
                        <input type="text" class="form-control form-control-border" name="difficulty">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputBorder">duration_minss</label>
                        <input type="text" class="form-control form-control-border" name="duration_minss">
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
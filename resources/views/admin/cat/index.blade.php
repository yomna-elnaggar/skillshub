
@extends('admin.layout')

@section('main')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">categories</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url("dashboard")}}">Home</a></li>
              <li class="breadcrumb-item active">categories</li>
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
                  <h3 class="card-title">All Categories</h3>
                  <div class="card-tools">
                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#new-add">
                      add new
                      </button>
                  </div>
                </div>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name(En)</th>
                        <th>Name(Ar)</th>
                        <th>Active</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cats as $cat)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$cat->name('en')}}</td>
                        <td>{{$cat->name('ar')}}</td>
                        <td>
                          @if($cat->active)
                            <span class="badge badge-pill badge-success">yes</span>
                           @else
                            <span class="badge badge-pill badge-danger">no</span>
                          @endif
                        </td>
                        <td>
                        <button type="button" data-id="{{$cat->id}}" data-name-en="{{$cat->name('en')}}" data-name-ar="{{$cat->name('ar')}} "class="btn btn-default update-btn" data-toggle="modal" data-target="#update-add">
                        <i class="fas fa-edit">
                        </i>
                      </button>
                        
                      
                        <a href="{{url("dashboard/cat/delete/$cat->id")}}" class="btn btn-sm btn-danger"><i class="fas fa-regular fa-trash">
                        </i>
                        </a>

                        <a href="{{url("dashboard/cat/toggle/$cat->id")}}" class="btn btn-sm btn-secondary"><i class="fas fa-toggle-on">
                        </i>
                        </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
           {{$cats->links()}} 
            </div>

    </div>


          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <div class="modal fade" id="new-add" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      <form id="form-id" action="{{url("dashboard/cat/store")}}" method= "POST">
      @csrf
        <div class="form-group">
        <label >name(Ar)</label>
        <input type="text" class="form-control" name="name_ar" >
        </div>
        <div class="form-group">
        <label >name(En)</label>
        <input type="text" class="form-control" name="name_en">
        </div>
      </form>
      

        <button type="button"  class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
        </button>
        </div>
        
        <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" form="form-id" class="btn btn-primary">Save changes</button>
      </div>
    </div>

    </div>

  </div>

  <div class="modal fade" id="update-add" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      <form id="update-id" action="{{url("dashboard/cat/update")}}" method= "POST">
      @csrf
        <input type="hidden" name="id" id="update-id-form">
        <div class="form-group">
        <label >name(Ar)</label>
        <input type="text" class="form-control" name="name_ar"  id="update-Na-form">
        </div>
        <div class="form-group">
        <label >name(En)</label>
        <input type="text" class="form-control" name="name_en" id="update-Ne-form">
        </div>
      </form>
      

        <button type="button"  class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
        </button>
        </div>
        
        <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" form="update-id" class="btn btn-primary">Save changes</button>
      </div>
    </div>

    </div>

  </div>
 @endsection
 

 @section('script')
  
 <script>
   $('.update-btn').click(function(){
    let id = $(this).attr('data-id')
    let namee = $(this).attr('data-name-en')
    let namaa = $(this).attr('data-name-ar')
     
    $('#update-id-form').val(id)
    $('#update-Na-form').val(namaa)
    $('#update-Ne-form').val(namee)
   })
 </script>
 @endsection
@extends('admin.layout.app')

@section('content')

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Parties Type</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Parties Type</li>
            </ol>
          </div>
        </div>
        <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title">Add Parties Type</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form class="form-horizontal" action="{{ url('admin/parties_type/add') }}" method="POST">
              @csrf
              <div class="card-body">
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Parties Type Name <span style="color: red">*</span></label>
                  <div class="col-sm-10">
                    <input type="text" name="parties_type_name" class="form-control" required placeholder="Parties Type Name">
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" class="btn btn-info">Submit</button>
                <a href="{{ url('admin/parties_type') }}" class="btn btn-info float-right">Cancle</a>
              </div>
              <!-- /.card-footer -->
            </form>
          </div>
      </div><!-- /.container-fluid -->
    </section>
 </div>

@endsection
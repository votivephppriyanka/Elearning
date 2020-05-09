@extends('admin.layout.layout')
@section('title', 'Edit Tutor')

@section('current_page_css')
@endsection

@section('current_page_js')
@endsection

@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tutors
        <small>Edit Tutor</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Tutors</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      @if ($message = Session::get('message'))
       <div class="alert alert-success alert-block">  
        <button type="button" class="close" data-dismiss="alert">×</button> 
        <strong>{{ $message }}</strong>
      </div>
      @endif

      @if ($message = Session::get('error'))
      <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button> 
        <strong>{{ $message }}</strong>
      </div>
      @endif

      @if ($message = Session::get('warning'))
      <div class="alert alert-warning alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button> 
        <strong>{{ $message }}</strong>
      </div>
      @endif

      @if ($message = Session::get('info'))
      <div class="alert alert-info alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button> 
        <strong>{{ $message }}</strong>
      </div>
      @endif

      @if ($errors->any())
      <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert">×</button> 
        <ul>
         @foreach ($errors->all() as $error)
         <li>{{ $error }}</li>
         @endforeach
       </ul>
     </div>
     @endif
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-xs-12">
          <!-- SELECT2 EXAMPLE -->
        <div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title">Edit Tutor</h3>
            <div class="box-tools pull-right">
              <!--<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>-->
            </div>
          </div>
          <!-- /.box-header -->
          <form action="{{url('/admin/update_tutor')}}" id="tutorForm" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_token" id="csrf-token" value="{{csrf_token()}}" />
            <div class="box-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name" value="{{(!empty($tutor_info->first_name) ? $tutor_info->first_name : '')}} {{(!empty($tutor_info->last_name) ? $tutor_info->last_name : '')}}" placeholder="Enter Full Name">
                  </div>
                  <!-- /.form-group -->
                  <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" name="username" value="{{(!empty($tutor_info->username) ? $tutor_info->username : '')}}" placeholder="Enter Username">
                  </div>
                  <!-- /.form-group -->
                  <div class="form-group">
                    <label>Curriculum</label>
                    <textarea type="text" class="form-control" name="curriculum">{{(!empty($tutor_info->curriculum) ? $tutor_info->curriculum : '')}}</textarea>
                  </div>

                  <input type="hidden" class="form-control" name="tutor_id" value="{{(!empty($tutor_info->id) ? $tutor_info->id : '')}}">
                  <!-- /.form-group -->
                  <!--<div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" name="email" placeholder="Enter Email Address">
                  </div>-->
                  <!-- /.form-group -->
                  <!--<div class="form-group">
                    <label>password</label>
                    <input type="password" class="form-control" name="password"  placeholder="Enter Password">
                  </div>-->
                  <!-- /.form-group -->
                </div>
                <!-- /.col -->
              </div>
            </div>
            <div class="box-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            <!-- /.row -->
          </form>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
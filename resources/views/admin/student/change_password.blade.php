@extends('admin.layout.layout')
@section('title', 'Change Password')

@section('current_page_css')
@endsection

@section('current_page_js')
<script type="text/javascript">
  $('#studentForm').validate({ 
      // initialize the plugin
      rules: {
       first_name: {
        required: true
      },

      last_name: {
        required: true
      },

      contact_number: {
        required: true
      },

      email: {
        required: true
      },

      password: {
        required: true
      }
    },
    submitHandler: function(form) {
      form.submit();
    }
  });
</script>
@endsection

@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Student
        <small>Change Password</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Change Password</li>
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
            <h3 class="box-title">Change Password</h3>
            <div class="box-tools pull-right">
              <!--<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>-->
            </div>
          </div>
          <!-- /.box-header -->
          <form action="{{url('/admin/update_student_password')}}" id="changePasswordForm" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_token" id="csrf-token" value="{{csrf_token()}}" />
            <input type="hidden" name="student_id" value="{{(!empty($student_info->id) ? $student_info->id : '')}}" />
            <div class="box-body">
              <div class="row">
                <div class="col-md-6">

                  <div class="form-group{{ $errors->has('new-password') ? ' has-error' : '' }}">
                  <label for="new-password">New Password</label>
                  <input type="password" class="form-control" name="new-password" id="new-password" placeholder="New Password">
                  @if ($errors->has('new-password'))
                      <span class="help-block">
                          <strong>{{ $errors->first('new-password') }}</strong>
                      </span>
                  @endif
                </div>

                <div class="form-group">
                  <label for="new-password-confirm">New Confirm Password</label>
                  <input type="password" class="form-control" name="new-password_confirmation" id="new-password-confirm" placeholder="New Confirm Password">
                </div>
                  <!-- /.form-group -->

                </div>
                <!-- /.col -->
              </div>
            </div>
            <div class="box-footer">
              <button type="submit" class="btn btn-primary">Update Password</button>
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
@extends('admin.layout.layout')
@section('title', 'Course List')

@section('current_page_css')
<!-- DataTables -->
<link rel="stylesheet" href="{{url('/')}}/resources/assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="{{url('/')}}/resources/assets/css/bootstrap-toggle.min.css">
@endsection

@section('current_page_js')
<!-- DataTables -->
<script src="{{url('/')}}/resources/assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{url('/')}}/resources/assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="{{url('/')}}/resources/assets/js/bootstrap-toggle.min.js"></script>
<script type="text/javascript">
  $(function () {
    $('#course_list').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
<script type="text/javascript">
 function delete_course(course_id){
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $.ajax({
   type: 'POST',
   url: "<?php echo url('/admin/delete_course'); ?>",
   enctype: 'multipart/form-data',
   data:{course_id:course_id,'_token':'<?php echo csrf_token(); ?>'},
     beforeSend:function(){
       return confirm("Are you sure you want to delete this item?");
     },
     success: function(resultData) { 
       console.log(resultData);
       var obj = JSON.parse(resultData);
       if (obj.status == 'success') {
          $('#success_message').fadeIn().html(obj.msg);
          setTimeout(function() {
            $('#success_message').fadeOut("slow");
          }, 2000 );
          $("#row" + course_id).remove();
       }
     },
     error: function(errorData) {
      console.log(errorData);
      alert('Please refresh page and try again!');
    }
  });
}
</script>
<script>
  $('.toggle-class').on("change", function() {
    var status = $(this).prop('checked') == true ? 1 : 0; 
    var course_id = $(this).data('id'); 
    
    $.ajax({
      type: "GET",
      dataType: "json",
      url: "<?php echo url('/admin/change_course_status'); ?>",
      data: {'status': status, 'course_id': course_id},
      success: function(data){
        $('#success_message').fadeIn().html(data.success);
        setTimeout(function() {
          $('#success_message').fadeOut("slow");
        }, 2000 );
      },
      error: function(errorData) {
        console.log(errorData);
        alert('Please refresh page and try again!');
      }
    });
  })
</script>
@endsection

@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Course
        <small>Course List</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Course</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <p style="display: none;" id="success_message" class="alert alert-success"></p>
      @if ($errors->any())
      <div class="alert alert-danger">
       <ul>
         @foreach ($errors->all() as $error)
         <li>{{ $error }}</li>
         @endforeach
       </ul>
     </div>
     @endif

     @if(Session::has('message'))
     <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('message') }}</p>
     @endif

     @if(Session::has('error'))
     <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('error') }}</p>
     @endif
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title pull-left"><h3 class="box-title" >Course List</h3>
              <h3 class="box-title pull-right"><a href="{{url('/admin/add_course')}}" class="btn btn-primary">Add</a></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="course_list" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>S.No.</th>
                    <th>Course Name</th>
                    <th>Status</th>
                    <th>Create Date</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @if(!$course_list->isEmpty())
                  <?php $i=1; ?>
                  @foreach($course_list as $arr)
                  <tr id="row{{$arr->id}}">
                    <td>{{$i}}</td>
                    <td>{{$arr->course_name}}</td>
                    <td>
                      <input data-id="{{$arr->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $arr->status ? 'checked' : '' }}>
                    </td>
                    <td>{{(!empty($arr->created_at) ? date('d-m-Y H:i A',strtotime($arr->created_at)) : 'N/A')}}</td>
                    <td>

                      <a href="{{url('/admin/edit_course')}}/{{base64_encode($arr->id)}}"><i class="fa fa-edit" aria-hidden="true" alt="edit" title="edit"></i></a>

                      <a href="javascript:void(0)" onclick="delete_course('<?php echo $arr->id; ?>');"><i class="fa fa-trash" aria-hidden="true" alt="delete" title="delete"></i></a>

                    </td>
                  </tr>
                  <?php $i++; ?>
                  @endforeach
                  @endif
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
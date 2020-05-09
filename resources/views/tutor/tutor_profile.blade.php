@extends('tutor.layout.layout')
@section('title', 'Tutor - Profile')

@section('current_page_css')
@endsection

@section('current_page_js')
@endsection

@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="min-height: 901px !important;">
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
      <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-3">
                    <div class="card profile-card">
                        <div class="profile-header">&nbsp;</div>
                        <div class="profile-body">
                            <div class="image-area">
                                <img src="{{url('resources/assets/dist/img/user2-160x160.jpg')}}" alt="AdminBSB - Profile Image" height="150" width="150" />
                            </div>
                            <div class="content-area">
                                <h5>{{ Auth::user()->email }}</h5>
                                <p>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</p>
                                <p>{{ Auth::user()->contact_number }}</p>
                                <p>Tutor</p>
                            </div>
                        </div>
                      
                    </div>

                 
                </div>
                <div class="col-xs-12 col-sm-9">
                    <div class="card">
                        <div class="body">
                            <div>
                                <!-- <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#profile_settings" aria-controls="settings" role="tab" data-toggle="tab">Profile Settings</a></li>
                                    <li role="presentation"><a href="#change_password_settings" aria-controls="settings" role="tab" data-toggle="tab">Change Password</a></li>
                                </ul> -->
                         @if(Session::has('success'))
                                <div class="alert alert-success" style="width: 80%; color: #8ec48e;">{{Session::get('success')}}</div>
                                @endif
                                @if(Session::has('danger'))
                                 <div class="alert alert-danger">{{Session::get('danger')}}</div>
                                @endif
                                <div class="tab-content">
                                    <!-- 
                                    <div role="tabpanel" class="tab-pane fade in active" id="profile_settings">
                                        <form class="form-horizontal">
                                            <div class="form-group">
                                                <label for="NameSurname" class="col-sm-2 control-label">Name</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="NameSurname" name="NameSurname" placeholder="Name Surname" value="{{ Auth::user()->first_name}}" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="Email" class="col-sm-2 control-label">Email</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <input type="email" class="form-control" id="Email" name="Email" placeholder="Email" value="{{ Auth::user()->email}}" required>
                                                    </div>
                                                </div>
                                            </div>
                                           
                                        </form>
                                    </div> -->
                               <!--      <div role="tabpanel" class="tab-pane fade in" id="change_password_settings">
                                        <form class="form-horizontal" id="form_validation" method="POST" action="{{ url('admin/change_password') }}">
                                            @csrf
                                            <?php  $segment =  Request::segment(3); ?>
                                            <input type="hidden" name="user_id" value="{{$segment}}" >
                                            <div class="form-group">
                                                <label for="OldPassword" class="col-sm-3 control-label">Old Password</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="password" class="form-control" id="old_password" name="old_password" placeholder="Old Password" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label">New Password</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="password" class="form-control" id="password" name="password" placeholder="New Password" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="NewPasswordConfirm" class="col-sm-3 control-label">New Password (Confirm)</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="New Password (Confirm)" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-offset-3 col-sm-9">
                                                    <button type="submit" name="submit" class="btn btn-danger">SUBMIT</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
  </div>
@endsection
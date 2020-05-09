<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>E-Learning</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ url('public/img/favicon.png') }}" rel="icon">
    <link href="{{ url('public/img/apple-touch-icon.png') }}" rel="apple-touch-icon">


  <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,800&display=swap" rel="stylesheet">

<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

<link href="https://fonts.googleapis.com/css2?family=Lalezar&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ url('public/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ url('public/vendor/icofont/icofont.min.css') }}" rel="stylesheet">
  <link href="{{ url('public/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ url('public/vendor/venobox/venobox.css') }}" rel="stylesheet">
  <link href="{{ url('public/vendor/owl.carousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
  <link href="{{ url('public/vendor/aos/aos.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ url('public/css/style.css') }}" rel="stylesheet">

  <style type="text/css">

html, body {
    background-color: rgb(2, 202, 185);
}

.tip {
  font-size: 20px;
  margin: 40px auto 50px;
  text-align: center;
}

.cont {
  overflow: hidden;
  position: relative;
  width: 900px;
  /*height: 550px;*/
  height:auto;
  background: #fff;
  margin: 50px auto 50px;
  border-radius: 10px;
}

.form {
  position: relative;
  width: 640px;
  height: 100%;
  -webkit-transition: -webkit-transform 1.2s ease-in-out;
  transition: -webkit-transform 1.2s ease-in-out;
  transition: transform 1.2s ease-in-out;
  transition: transform 1.2s ease-in-out, -webkit-transform 1.2s ease-in-out;
  padding: 50px 30px 0;
}

.sub-cont {
  overflow: hidden;
  position: absolute;
  left: 640px;
  top: 0;
  width: 900px;
  height: 100%;
  padding-left: 260px;
  background: #fff;
  -webkit-transition: -webkit-transform 1.2s ease-in-out;
  transition: -webkit-transform 1.2s ease-in-out;
  transition: transform 1.2s ease-in-out;
  transition: transform 1.2s ease-in-out, -webkit-transform 1.2s ease-in-out;
}
.cont.s--signup .sub-cont {
  -webkit-transform: translate3d(-640px, 0, 0);
          transform: translate3d(-640px, 0, 0);
}

button {
  display: block;
  margin: 0 auto;
  width: 260px;
  height: 36px;
  border-radius: 30px;
  color: #fff;
  font-size: 15px;
  cursor: pointer;
  border: none;
}

.img {
  overflow: hidden;
  z-index: 2;
  position: absolute;
  left: 0;
  top: 0;
  width: 260px;
  height: 100%;
  padding-top: 360px;
}
.img:before {
  content: '';
  position: absolute;
  right: 0;
  top: 0;
  width: 900px;
  height: 100%;
  background-image: url("public/img/banner1.jpg");
  background-size: cover;
  -webkit-transition: -webkit-transform 1.2s ease-in-out;
  transition: -webkit-transform 1.2s ease-in-out;
  transition: transform 1.2s ease-in-out;
  transition: transform 1.2s ease-in-out, -webkit-transform 1.2s ease-in-out;
}
.img:after {
  content: '';
  position: absolute;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  background: rgba(0, 0, 0, 0.6);
}
.cont.s--signup .img:before {
  -webkit-transform: translate3d(640px, 0, 0);
          transform: translate3d(640px, 0, 0);
}
.img__text {
  z-index: 2;
  position: absolute;
  left: 0;
  top: 50px;
  width: 100%;
  padding: 0 20px;
  text-align: center;
  color: #fff;
  -webkit-transition: -webkit-transform 1.2s ease-in-out;
  transition: -webkit-transform 1.2s ease-in-out;
  transition: transform 1.2s ease-in-out;
  transition: transform 1.2s ease-in-out, -webkit-transform 1.2s ease-in-out;
}
.img__text h2 {
  margin-bottom: 10px;
  font-weight: normal;
  margin-top: 40px;
}
.img__text p {
  font-size: 14px;
  line-height: 1.5;
}
.cont.s--signup .img__text.m--up {
  -webkit-transform: translateX(520px);
          transform: translateX(520px);
}
.img__text.m--in {
  -webkit-transform: translateX(-520px);
          transform: translateX(-520px);
}
.cont.s--signup .img__text.m--in {
  -webkit-transform: translateX(0);
          transform: translateX(0);
}
.img__btn {
  overflow: hidden;
  z-index: 2;
  position: relative;
  width: 100px;
  height: 36px;
  margin: 0 auto;
  background: transparent;
  color: #fff;
  text-transform: uppercase;
  font-size: 15px;
  cursor: pointer;
}
.img__btn:after {
  content: '';
  z-index: 2;
  position: absolute;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  border: 2px solid #fff;
  border-radius: 30px;
}
.img__btn>span {
  position: absolute;
  left: 0;
  top: 0;
  display: -webkit-box;
  display: flex;
  -webkit-box-pack: center;
          justify-content: center;
  -webkit-box-align: center;
          align-items: center;
  width: 100%;
  height: 100%;
  -webkit-transition: -webkit-transform 1.2s;
  transition: -webkit-transform 1.2s;
  transition: transform 1.2s;
  transition: transform 1.2s, -webkit-transform 1.2s;
}
.img__btn span.m--in {
  -webkit-transform: translateY(-72px);
          transform: translateY(-72px);
}
.cont.s--signup .img__btn span.m--in {
  -webkit-transform: translateY(0);
          transform: translateY(0);
}
.cont.s--signup .img__btn span.m--up {
  -webkit-transform: translateY(72px);
          transform: translateY(72px);
}

h2 {
  width: 100%;
  font-size: 26px;
  text-align: center;
}

label {
  display: block;
  width: 260px;
  margin: 25px auto 0;
  text-align: center;
}
label span {
  font-size: 12px;
  color: #cfcfcf;
  text-transform: uppercase;
}
input:focus {
    outline: none;
}
button.fb-btn {
    border: none;
}
input {
  display: block;
  width: 100%;
  margin-top: 5px;
  padding-bottom: 5px;
  font-size: 16px;
  border-bottom: 1px solid rgba(0, 0, 0, 0.4) !important;
  text-align: center;
  border: none;
}

.forgot-pass {
  margin-top: 15px;
  text-align: center;
  font-size: 12px;
  color: #cfcfcf;
}

.submit {
  margin-top: 40px;
  margin-bottom: 20px;
  background: #02cab9;
  text-transform: uppercase;
  border: none;
}
button.submit:hover {
    background-color: #02a295;
}
.fb-btn {
  border: 2px solid #d3dae9;
  color: #8fa1c7;
}
.fb-btn span {
  font-weight: bold;
  color: #455a81;
}

.sign-in {
  -webkit-transition-timing-function: ease-out;
          transition-timing-function: ease-out;
}
.cont.s--signup .sign-in {
  -webkit-transition-timing-function: ease-in-out;
          transition-timing-function: ease-in-out;
  -webkit-transition-duration: 1.2s;
          transition-duration: 1.2s;
  -webkit-transform: translate3d(640px, 0, 0);
          transform: translate3d(640px, 0, 0);
}

.sign-up {
  -webkit-transform: translate3d(-900px, 0, 0);
          transform: translate3d(-900px, 0, 0);
}
.cont.s--signup .sign-up {
  -webkit-transform: translate3d(0, 0, 0);
          transform: translate3d(0, 0, 0);
}

.icon-link {
  position: absolute;
  left: 5px;
  bottom: 5px;
  width: 32px;
}
.icon-link img {
  width: 100%;
  vertical-align: top;
}
.icon-link--twitter {
  left: auto;
  right: 5px;
}
.error{
  color:red;
}


@media (max-width: 767px) {
  .cont {
    overflow: hidden;
    position: relative;
    width: 80%;
    height: 100%;
    background: #fff;
    margin: 50px auto 50px;
    border-radius: 10px;
}
.form {
    position: relative;
    width: 100%;
    height: 100%;
    padding-bottom: 80px;
}
.sub-cont {
    overflow: hidden;
    position: absolute;
    left: 100%;
    top: 0;
    width: 100%;
    height: 100%;
    padding-left: 0px;
    background: #fff;
    -webkit-transition: -webkit-transform 1.2s ease-in-out;
    transition: -webkit-transform 1.2s ease-in-out;
    transition: transform 1.2s ease-in-out;
    transition: transform 1.2s ease-in-out, -webkit-transform 1.2s ease-in-out;
}
.cont.s--signup .sub-cont {
    -webkit-transform: translate3d(0px, 0, 0);
    transform: translate3d(0px, 0, 0);
    left: 0px;
}
.img {
    overflow: hidden;
    z-index: 2;
    position: absolute;
    left: 0;
    top: 0;
    width: 260px;
    height: 100%;
    padding-top: 360px;
    display: none;
}
.img__btn {
    color: #000;
}
label {
    display: block;
    width: 100%;
    margin: 25px auto 0;
    text-align: center;
}
button {
    display: block;
    margin: 0 auto;
    width: 100%;
    height: 36px;
    border-radius: 30px;
    color: #fff;
    font-size: 15px;
    cursor: pointer;
    border: none;
}
.img__btn {
    color: #000;
    width: 100%;
    margin-top: 30px;
        height: 50px;
}
.img__btn>span span {
    /* float: left; */
    /* width: 100%; */
    font-size: 12px;
    position: absolute;
    top: -1px;
    color: #949494;
}
}

  </style>

</head>

<body>

   <div class="cont">
  <div class="form sign-in">
    <h2>Welcome To Elearning </h2>
    <h2>Student Sign Up</h2>
    <div id="msg"></div>
    <form  id="studentForm" method="POST" name="studentForm" action="javascript:void(0)">
      <input type="hidden" name="_token" id="csrf-token" value="{{csrf_token()}}" />
    <label>
      <span>First Name</span>
      <input id="first_name" type="text" class="@error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}"  autocomplete="first_name" autofocus>
    </label>
    <label>
      <span>Last Name</span>
      <input id="last_name" type="text" class="@error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}"  autocomplete="last_name" autofocus>
    </label>
    <label>
      <span>Username</span>
      <input id="username" type="text" class="@error('username') is-invalid @enderror" name="username" value="{{ old('username') }}"  autocomplete="username" autofocus>
    </label>
    <label>
      <span>Email</span>
      <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email">
    </label>
    <label>
      <span>Password</span>
       <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password"  autocomplete="new-password">
    </label>
    <label>
      <span>Confirm Password</span>
       <input id="password_confirmation" type="password"  name="password_confirmation"  autocomplete="new-password">
    </label>
    <p class="forgot-pass"><a href="#">Forgot password?</a></p>
    <button type="submit" id="std_btn" class="submit">Sign Up</button>
  </form>
    <button type="button" class="fb-btn">Connect with <span>facebook</span></button>
    <div class="img__btn forMobi">
        <span class="m--up"><span>No account yet?</span>Sign Up</span>
        <span class="m--in"><span>Already have an account?</span> Sign In</span>
    </div>
  </div>
  <div class="sub-cont">
    <div class="img">
      <div class="img__text m--up">
        <span><a href="{{url('/')}}"><img src="{{ url('public/img/logo.png') }}"></a></span>
        <h2>One of us?</h2>
        <p>If you already has an account, just sign in. We've missed you!</p>
      </div>

      <a href="signin"><div class="img__btn">
        <span class="m--up">Sign In</span>
        <!-- <span class="m--in">Sign In</span> -->
      </div></a>
    </div>
   
  </div>
</div>


 <!-- Vendor JS Files -->
  <script src="{{ url('public/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ url('public/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ url('public/vendor/jquery.easing/jquery.easing.min.js') }}"></script>
  <script src="{{ url('public/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ url('public/vendor/waypoints/jquery.waypoints.min.js') }}"></script>
  <script src="{{ url('public/vendor/counterup/counterup.min.js') }}"></script>
  <script src="{{ url('public/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ url('public/vendor/venobox/venobox.min.js') }}"></script>
  <script src="{{ url('public/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
  <script src="{{ url('public/vendor/aos/aos.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ url('public/js/main.js') }}"></script>
  <script src="{{ url('public/js/app.js') }}" defer></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script>

  <script type="text/javascript">

  // $('.img__btn').click(function(e){
  //   $(this).closest("body").find('.cont').toggleClass('s--signup');
  // });

  // $('.remov-sign').click(function(e){
  //   $(this).parent().addClass('active');
  // });

  </script>
  
  <style>
    .modal-backdrop{
      z-index: 0 !important;
    }
  </style>


<script>

// Get the modal
var modal = document.getElementById('id02');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

// Get the modal
var modal = document.getElementById('id03');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

<script type="text/javascript">
  var site_url = "<?php echo url('/'); ?>";
   $("#studentForm").validate({
      
    rules: {
        first_name: {
                required: true,
            },
        last_name: {
            required: true,
        },
        username: {
            required: true,
        },
        email: {
                required: true,
                email: true,
                 
            }, 
        password: {
           required: true,

         },
       password_confirmation: {
           required: true,
           equalTo:'#password',
         },      
    },
    messages: {
      first_name: {
        required: "First name is required",
      },
      last_name: {
        required: "Last name is required",
      },
      username: {
        required: "User name is required",
      },
      email: {
          required: "Email id is required",
          email: "Please enter valid email",
        },
      password : {
          required : "Password is required",
        },
      password_confirmation : {
          required : "Password is required",
          equalTo : "Confirm password does not match",
        },
         
    },
    submitHandler: function(form) {
     $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
      
      $.ajax({
        url: site_url+'/student_save' ,
        type: "POST",
        data: $('#studentForm').serialize(),
        success: function( response ) {
            $('#std_btn').html('Submit');
            if(response.status==false){
              $('#msg').html('<p style="text-align:center;color:red">'+response.msg+'</p>');
            }else{
              $('#msg').html('<p style="text-align:center;color:green">'+response.msg+'</p>');
            }
            //$('#msg').html(response.msg);
            //$('#msg_div').removeClass('d-none');
          
            if(response.status==true){
              document.getElementById("studentForm").reset();
              setTimeout(function(){
              $('#msg').hide();
                window.location.href = site_url+"/verification";
              },5000);
          }
          
        }
      });
    }
  })
</script>
</body>

</html>


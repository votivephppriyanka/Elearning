<footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

        

          <div class="col-lg-3 col-md-6 footer-links" data-aos="fade-up" data-aos-delay="150">
            <h4>About Us</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Help</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">How it works</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Scholarship</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Cognitive scholarship</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Education partners</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">We are hiring!</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Blog</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Media Kit</a></li>
            </ul>
          </div>


          <div class="col-lg-3 col-md-6 footer-links" data-aos="fade-up" data-aos-delay="150">
            <h4>Learn</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Questions and Answers</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Find a private tutor</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Affiliate program</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Referral program</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Enterprise</a></li>
            </ul>

          </div>

          <div class="col-lg-3 col-md-6 footer-links" data-aos="fade-up" data-aos-delay="250">
            <h4>Job Opportunities</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Become a tutor</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Tutoring jobs</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links footer_address" data-aos="fade-up" data-aos-delay="250">
            <h4>Contact Us</h4>
            <ul>
              <li><i class="fa fa-map-marker"></i>681 4th Ave Store Front, Brooklyn New York11232, USA </li>
              <li><i class="fa fa-phone"></i>718-788-0595</li>
              <li><i class="fa fa-phone"></i>347-788-0595</li>
            </ul>
            <div class="social-links mt-3">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
              </div>
          </div>

        </div>
      </div>
    </div>

    <div class="container-fluid ">
    <div class="row">
      <div class="container ">
      <div class="copyright">
        <p>&copy; Copyright <strong><span>E-learning</span></strong>. All Rights Reserved</p>

        <div class="last-Link">  
          <a href="#">Terms of Service</a>
          <a href="#">Privacy Policy</a>
          <a href="#">Refund Policy</a>
        </div>
        </div>
      </div>
      <div class="credits">
       
      </div>
  </div>
  </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
  
  </body>
</html>

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


<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>  -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script>
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

	 $("#loginForm").validate({
      
    rules: {
        email: {
                required: true,
                email: true,
            }, 
         password: {
         	 required: true,
         },      
    },
    messages: {
      email: {
          required: "Email id is required",
          email: "Please enter valid email",
        },
        password : {
        	required : "Password is required",
        }
         
    },
    submitHandler: function(form) {
     $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
      
      $.ajax({
        url: 'http://localhost/virtualclasspaltform/userlogin' ,
        type: "POST",
        data: $('#loginForm').serialize(),
        success: function( response ) {
            $('#login_sub').html('Submit');
            
            $('#loginmsg').html(response.msg);
            //$('#msg_div').removeClass('d-none');
            if(response.user_role==2){

            document.getElementById("loginForm").reset(); 
            setTimeout(function(){
            $('#res_message').hide();
              window.location.href = "http://localhost/virtualclasspaltform/tutor/dashboard";
            },3000);
          }
          if(response.user_role==3){

            document.getElementById("loginForm").reset(); 
            setTimeout(function(){
            $('#res_message').hide();
              window.location.href = "http://localhost/virtualclasspaltform/student";
            },3000);
          }
        }
      });
    }
  })
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
            
            $('#msg').html(response.msg);
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

<script type="text/javascript">
  var site_url = "<?php echo url('/'); ?>";
   $("#tutorsForm").validate({
      
    rules: {
        first_name: {
                required: true,
            },
        last_name: {
            required: true,
        },
        email: {
                required: true,
                email: true,
                 
            },
        contact_number: {
          required: true,
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
      email: {
          required: "Email id is required",
          email: "Please enter valid email",
        },
        contact_number: {
          required: "Contact number is required",
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
        url: site_url+'/tutors_save' ,
        type: "POST",
        data: $('#tutorsForm').serialize(),
        success: function( response ) {
            $('#tt_btn').html('Submit');
            
            $('#msg').html(response.msg);
            //$('#msg_div').removeClass('d-none');
          
            if(response.status==true){
              document.getElementById("tutorsForm").reset();
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


<script type="text/javascript">
  var site_url = "<?php echo url('/'); ?>";
   $("#verifyForm").validate({
      
    rules: {
        otp : {
                required: true,
            },    
    },
    messages: {
      otp: {
        required: "OTP is required",
      },  
    },
    submitHandler: function(form) {
     $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
      
      $.ajax({
        url: site_url+'/verifyotp' ,
        type: "POST",
        data: $('#verifyForm').serialize(),
        success: function( response ) {
            $('#vf_btn').html('Submit');
            
            $('#msg').html(response.msg);
            //$('#msg_div').removeClass('d-none');
          
            if(response.status==true){
              document.getElementById("verifyForm").reset();
              setTimeout(function(){
              $('#msg').hide();
                window.location.href = site_url+"/login";
              },5000);
          }
          
        }
      });
    }
  })
</script>

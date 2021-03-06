@extends('userlayouts.layouts.header')
@section('content')
<body class="signupbg">
   <div style="    padding-bottom: 30px;
      float: left;
      width: 100%;" >
      <div class="adminlogin_outer">
         <div class="adminlogin_inner">
            <div class="admminlogo_outer">
               <a href="{{ url('/') }}"><img class="signupbglo" src="{{ asset('user/images/logo.png') }}" ></a>
            </div>
            <div class="adminlogin_form">
            @if(session()->has('failure'))
				<div class="alert alert-danger">
				   {{ session()->get('failure') }}
				</div>
				@endif
               <form action="{{ url('signin') }}" method="post" name="l1" id="l1" autocomplete="off" enctype="multipart/form-data">
                  @csrf
                  <div class="admin_box">
                     <div class="input_login emaillog">
                        <input name="email" id="email" value="" placeholder="Email Id" class="user_box" tabindex="1" required autocomplete="off" type="text">
                     </div>
                  </div>
                  <div class="admin_box">
                     <div class="input_login passlog">
                        <input name="pass" id="pass" value=""  placeholder="Enter your password" class="user_box user_box1" tabindex="1" required type="password">
                        <i  toggle="#pass" class="toggle-password"><img class="eyechmg" src="{{ asset('user/images/eye.png') }}" /></i>
                     </div>
                  </div>
                  <script language="javascript">
                     $(".toggle-password").click(function() {
                     
                     var input = $($(this).attr("toggle"));
                     if (input.attr("type") == "password") {
                      input.attr("type", "text");
                      $('.eyechmg').prop('src', 'images/eye1.png');
                     } else {
                      input.attr("type", "password");
                      $('.eyechmg').prop('src', 'images/eye.png');
                     }
                     });
                     
                  </script> 
                  <!-- 
                     <div class="google_capca">
                     <img src="{{ asset('user/images/google-cap.jpg') }}" />
                     </div>
                      -->
                  <div class="admin_box" style="margin-bottom:0px;">
                     <input type="submit" name="login" value="Login" class="login_but">
                  </div>
                  <div class="clearfix"></div>
                  <div class="socite"><a href="{{ route('password.request') }}">Forgot Password ?</a></div>
                  <div class="clearfix"></div>
                  <h5 class="alry">Not on Bit2atm yet? <a class="for_pass" href="{{ url('signup') }}">Sign up</a></h5>
               </form>
            </div>
         </div>
      </div>
      <script>
         $(function() {
         
         var d = new Date();
         
         var n = d.getFullYear();
         
         document.getElementById("ayear").innerHTML = n;
         
         
         
         });
         
         
         
      </script>
   </div>
   @endsection
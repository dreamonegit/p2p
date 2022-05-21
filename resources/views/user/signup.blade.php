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

<h5 class="admin_head">Create a free account</h5>

<div class="adminlogin_form">
<form action="" method="post" name="l1" id="l1" autocomplete="off" enctype="multipart/form-data">@csrf

<div class="admin_box">

<div class="input_login emaillog">

<input name="email" id="user" value="" placeholder="Email Id" class="user_box" tabindex="1" required autocomplete="off" type="email">

</div>

</div>



<div class="admin_box">

<div class="input_login passlog">

<input name="pass" id="pass" value="" placeholder="Password" class="user_box user_box1" tabindex="1" required type="password">

<i  toggle="#pass" class="toggle-password"><img class="eyechmg" src="{{ asset('user/images/eye.png') }}" /></i>

</div>

</div>

<div class="admin_box">

<div class="input_login passlog">

<input name="cpass" id="cpass" value="" placeholder="Confirm Password." class="user_box user_box1" tabindex="1" required type="password">

<i  toggle="#cpass" class="toggle-password1"><img class="eyechmg1" src="{{ asset('user/images/eye.png') }}" /></i>

</div>

</div>


<script>

$(document).ready(function(){
$(".refbut").click(function(){
  $(".css-hiy16i").toggle();
});
});
</script>


<div class="css-15651n7" value="">
<div class="css-xrxl27">

<div style="float:left; margin-top:10px;"  class="refbut">
<div data-bn-type="text"  style="float:left;" class="css-itrsu7">Referral ID (Optional)</div>
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="css-1iztezc" style="position: relative;
top: -3px;">
<path d="M16 9v2l-4 4.24L8 11V9h8z">
</path></svg></div></div>



<div class="css-hiy16i" style="display:none;">
<div class=" css-mhhq7a">
<input data-bn-type="input" style="border:1px solid #ccc; margin-top:5px;" name="agentId" class="css-uesmnb user_box user_box1" value="">
<div class="bn-input-suffix css-vurnku">
<div class="css-1gkkq18">
</div></div></div></div>
<div data-bn-type="text" class="help_default css-10pzx7y"></div></div>



<!--<div class="admin_box">

<div class="input_login emaillogg">

			
<input type="text" class="user_box user_box1" name="ref" placeholder="Referral ID" required>

</div>
</div>-->




<div class="socite1"><input type="checkbox" class="ch_box1" required />I'have read and agreed <a href="{{ url('privacypolicy') }}" target="_blank">Privacy Policy</a> with <a href="terms-conditions.html" target="_blank">Terms and Conditions</a> </div>


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

	  $(".toggle-password1").click(function() {

  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
    $('.eyechmg1').prop('src', 'images/eye1.png');
  } else {
    input.attr("type", "password");
    $('.eyechmg1').prop('src', 'images/eye.png');
  }
});
</script> 



<div class="clearfix"></div>
<div class="google_capca">
<img src="{{ asset('user/images/google-cap.jpg') }}" />
</div>

<div class="admin_box" style="margin-bottom:0px;">

<input type="submit" name="login" value="Create Account" class="login_but">

</div>

<div class="clearfix"></div>
<h5 class="alry">Already Registered?  <a class="for_pass" href="{{ url('signin') }}">LOGIN</a></h5>



<div class="clearfix"></div>








</form>
</div>



</div>

</div>
@endsection






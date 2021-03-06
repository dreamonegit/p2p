@extends('userlayouts.layouts.header_auth')
@section('content')
<div class="clear"></div>
<!--body-start--->
<div class="header-out-1">
   <div class="container">
      <div class="col-md-12">
         <div class="acc-ou-1">
            <a href="{{ url('/user/account') }}">
               <div class="acc-ou-1-1">Account</div>
            </a>
         </div>
         <div class="acc-ou-2">
            <a href="{{ url('/user/profile-verification') }}">
               <div class="acc-ou-2-2">Profile Verification</div>
            </a>
         </div>
         <div class="acc-ou-2">
            <a href="{{ url('/user/wallet') }}">
               <div class="acc-ou-2-2">Wallet</div>
            </a>
         </div>
         <div class="acc-ou-2">
            <a href="{{ url('/user/deposit-history') }}">
               <div class="acc-ou-2-2">Deposit History</div>
            </a>
         </div>
         <div class="acc-ou-2">
            <a href="{{ url('/user/logout') }}">
               <div class="acc-ou-2-2">Logout</div>
            </a>
         </div>
      </div>
      <div class="col-md-6">
         <!--<div class="acc-ou-3">
            <div class="acc-ou-3-3">My Invitation</div>
            </div>-->
      </div>
      <!-------------------1--->
      <div class="packages-bgg">
         <div class="package-1">
            <div class="body-pac-head">
               Last Logged in : 2021-06-01 23:06:01 IP: 2409:4072:6d8d:53b9:cd76:a24f:5312:f064
            </div>
            <div class="col-md-4">
               <div class="package-title-sub">
                  <span>
                     <!--<img src="images/logo-btrn.png" />-->
                  </span>
                  <div class="acc-ou-4">
                     <p>Name</p>
                     <div class="acc-ou-4-4"> <img style="padding-top: 2px; float: left; padding-right: 10px;" src="images/Layer 25.png" /> @if(isset(auth::user()->name)) {{ auth::user()->name }} @endif</div>
                  </div>
               </div>
            </div>
            <div class="col-md-4">
               <div class="package-title-subb">
                  <span><img src="images/Layer 26.png" /></span> 
                  <div class="acc-ou-5">
                     <p>Mobile Number</p>
                     <div class="acc-ou-5-5">@if(isset(auth::user()->mobile)) {{ auth::user()->mobile }} @endif</div>
                  </div>
               </div>
            </div>
            <div class="col-md-4">
               <div class="package-title-subb">
                  <span><img src="images/email-iconn.png" /></span> 
                  <div class="acc-ou-5">
                     <p>Mail ID</p>
                     <div class="acc-ou-5-5">@if(isset(auth::user()->email)) {{ auth::user()->email }} @endif</div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-------------------1--->
      <!-------------------2--->
      <div class="package-2">
         <div class="package-title">
            Personal Information
         </div>
         <div class="e-ou-space">
            <form action="{{ url('/user/updateprofile') }}" method="post">@csrf
               <div class="col-md-4">
                  <div class="contact_title">
                     Full Name <span>*</span>
                  </div>
                  <input type="text" class="enq-input" name="fname" placeholder="First Name" required value="@if(isset(auth::user()->name)) {{ auth::user()->name }} @endif">
               </div>
               <div class="col-md-4">
                  <div class="contact_title">
                     Last Name  <span>*</span>
                  </div>
                  <input type="text" class="enq-input" name="lname" placeholder="Last Name" value="@if(isset(auth::user()->lname)) {{ auth::user()->lname }} @endif">
               </div>
               <div class="col-md-4">
                  <div class="contact_title">
                     Email Address <span>*</span>
                  </div>
                  <input type="email" class="enq-input" name="email" placeholder="Email" required value="@if(isset(auth::user()->email)) {{ auth::user()->email }} @endif">
               </div>
               <div class="col-md-4">
                  <div class="contact_title">
                     Mobile-Number <span>*</span>
                  </div>
                  <input type="text" class="enq-input"  name="mobile" placeholder="Mobile Number" required value="@if(isset(auth::user()->mobile)) {{ auth::user()->mobile }} @endif">
               </div>
               <div class="col-md-4">
                  <div class="contact_title">
                     Gender <span>*</span>
                  </div>
                  <select name="gender" id="service" class="enq-input city-space-2" required="">
                     <option value="" selected="" disabled="">Select Gender</option>
                     <option value="Male" @if(isset(auth::user()->gender)) @if(auth::user()->gender=='Male') {{ "selected" }} @endif @endif>Male </option>
                     <option value="Female" @if(isset(auth::user()->gender)) @if(auth::user()->gender=='Female') {{ "selected" }} @endif @endif>Female</option>
                     <option value="Others" @if(isset(auth::user()->gender)) @if(auth::user()->gender=='Male') {{ "Others" }} @endif @endif>Others</option>
                  </select>
               </div>

               <div class="col-md-4">
                  <div class="contact_title">
                     Country <span>*</span>
                  </div>
                  <select name="country" id="country" class="enq-input city-space-2" required="">
                     <option value="" selected="" disabled=""> Select Country </option>
					 @foreach($countries as $countriesval)
						<option value="{{ $countriesval->name }}" @if(auth::user()->country==$countriesval->name) {{ "selected" }} @endif> {{ $countriesval->name }}</option>
					@endforeach
                  </select>
               </div>
               <div class="col-md-4">
                  <div class="contact_title">
                     City <span>*</span>
                  </div>
                  <input type="text" class="enq-input" name="city" placeholder="City " required value="@if(isset(auth::user()->city)) {{ auth::user()->city }} @endif">
               </div>
               <div class="col-md-4">
                  <div class="contact_title">
                     State Or Province <span>*</span>
                  </div>
                  <input type="text" class="enq-input" name="state_province" placeholder="State " required value="@if(isset(auth::user()->state_province)) {{ auth::user()->state_province }} @endif">
               </div>
               <div class="col-md-4">
                  <div class="contact_title">
                     Zipcode Or Postcode <span>*</span>
                  </div>
                  <input class="enq-input" id="pin" name="pin" type="text" placeholder="Pincode" required value="@if(isset(auth::user()->pin)) {{ auth::user()->pin }} @endif">
               </div>
               <div class="col-md-4">
                  <div class="contact_title">
                     Date Of Birth <span>*</span>
                  </div>
                  <input class="enq-input enq-dob-input datepicker" name="bkdate" type="text" required="" value="@if(isset(auth::user()->bkdate)) {{ auth::user()->bkdate }} @endif"> 
               </div>
               <div class="col-md-4">
                  <div class="contact_title">
                     Address Line 1 <span>*</span>
                  </div>
                  <textarea class="enq-input" name="address" placeholder="Address " required>@if(isset(auth::user()->address)) {{ auth::user()->address }} @endif</textarea>
               </div>
               <div class="col-md-4">
                  <div class="contact_title">
                     Address Line 2 
                  </div>
                  <textarea class="enq-input" name="address1" placeholder="Address " required>@if(isset(auth::user()->address1)) {{ auth::user()->address1 }} @endif </textarea>
               </div>
               <div class="clearfix"></div>
               <div class="col-md-3">
               </div>
               <div class="col-md-6">
                  <div class="sub-ouo">
                     <input type="submit" value="Update Profile" id="submit" name="register" class="form-btnn semibold" >
                  </div>
               </div>
               <div class="col-md-3">
               </div>
            </form>
         </div>
         <div class="clearfix"></div>
      </div>
      <!-------------------2--->
      <!-------------------3--->
      <div class="package-2">
         <div class="package-title">
            Two Factor Authentication
         </div>
         <!-----1--->
         <div class="col-md-10">
            <div class="package-title-subbb">
               <span><img src="images/icon.png" /></span> 
               <div class="acc-ou-6">
                  <p>Google Authentication</p>
                  <div class="acc-ou-6-6"> To protect your account, please set Google Authenticator.</div>
               </div>
            </div>
         </div>
         <div class="col-md-2">
            <div class="acc-ou-7">
               <div class="acc-ou-7-7"><a href="https://myaccount.google.com/signinoptions/two-step-verification" target='_blank'>Enable</div>
            </div>
         </div>
         <!-----1--->
         <!-----1--->
         <div class="col-md-10">
            <div class="package-title-subbb">
               <span><img src="images/iconn.png" /></span> 
               <div class="acc-ou-6">
                  <p>Sms Authentication</p>
                  <div class="acc-ou-6-6"> To protect your account, please set sms Authenticator.</div>
               </div>
            </div>
         </div>
         <div class="col-md-2">
            <div class="acc-ou-7">
               <div class="acc-ou-7-7">Disable</div>
            </div>
         </div>
         <!-----1--->
         <!-----1--->
         <div class="col-md-10">
            <div class="package-title-subbb">
               <span><img src="images/iconnn.png" /></span> 
               <div class="acc-ou-6">
                  <p>E-mail Authentication</p>
                  <div class="acc-ou-6-6"> To protect your account, please set E-mail Authenticator.</div>
               </div>
            </div>
         </div>
         <div class="col-md-2">
            <div class="acc-ou-7">
               <div class="acc-ou-7-7">Disable</div>
            </div>
         </div>
         <!-----1--->
      </div>
      <!-------------------3--->
      <!-------------------4--->
      <div class="package-3">
         <div class="package-title-1">
            Security Setting
         </div>
         <div class="col-md-10">
            <div class="package-title-subbb">
               <span><img src="images/security-icon.png" /></span> 
               <div class="acc-ou-9">
                  <p>Security Setting</p>
                  <div class="acc-ou-9-9">Used for login.</div>
               </div>
            </div>
         </div>
         <div class="col-md-2">
            <div class="acc-ou-8">
               <div class="acc-ou-8-8">Change</div>
            </div>
         </div>
         <div class="col-md-10">
            <div class="package-title-subbb">
               <span><img src="images/email-icon.png" /></span> 
               <div class="acc-ou-9">
                  <p> Email Setting</p>
                  <div class="acc-ou-9-9">Used for TFA, changing password, editing safety settings</div>
               </div>
            </div>
         </div>
         <div class="col-md-2">
            <div class="acc-ou-8">
               <div class="acc-ou-8-8">Reset</div>
            </div>
         </div>
      </div>
      <!-------------------4--->
      <!-------------------5--->
      <div class="package-2">
         <div class="package-title">
            API KEY
         </div>
         <div class="col-md-10">
            <div class="package-title-subbb">
               <span><img src="images/Layer 586.png" /></span> 
               <div class="acc-ou-6">
                  <p>Enable API KEY</p>
                  <div class="acc-ou-6-6">Enable API access on your account to generate keys after kyc verification.</div>
               </div>
            </div>
         </div>
         <div class="col-md-2">
            <div class="acc-ou-7">
               <div class="acc-ou-7-7">Enable</div>
            </div>
         </div>
      </div>
      <!-------------------5--->
      <!-------6-------->
      <div class="package-4">
         <table class="small_tb1" border="0" cellpadding="4px" cellspacing="4px">
            <tr>
               <th colspan="4">
                  <div class="border-1">Recent Login</div>
               </th>
            </tr>
            <tr>
               <td>
                  <div class="border-2">Date</div>
               </td>
               <td>
                  <div class="border-2">Browser</div>
               </td>
               <td>
                  <div class="border-2">IP Address</div>
               </td>
               <td>
                  <div class="border-2">Location</div>
               </td>
            </tr>
			@foreach($loghistory as $loghistoryval)
				<tr>
				   <td>
					  <div class="border-3">{{ $loghistoryval->date }}</div>
				   </td>
				   <td>
					  <div class="border-3">{{ $loghistoryval->browser }}</div>
				   </td>
				   <td>
					  <div class="border-3">{{ $loghistoryval->ip }}</div>
				   </td>
				   <td>
					  <div class="border-3">India</div>
				   </td>
				</tr>
			@endforeach
         </table>
      </div>
      <!-------6-------->
   </div>
</div>
<!--body-end--->

@endsection
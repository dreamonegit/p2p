@extends('userlayouts.layouts.header_auth')
@section('content')
<!--header-end--->
<div class="clear"></div>
<!--body-start--->

<div class="header-out-1">
<div class="container">
   <div class="col-md-6">
      <div class="acc-ou-1">
		  <a href="{{ url('/user/account') }}">
			 <div class="@if(Request::segment(2)=='account') {{ 'acc-ou-1-1' }} @else acc-ou-2-2 @endif">Account</div>
		  </a>
      </div>
      <div class="acc-ou-2">
		  <a href="{{ url('/user/profile-verification') }}">
			 <div class="@if(Request::segment(2)=='profile-verification') {{ 'acc-ou-1-1' }} @else 'acc-ou-2-2' @endif">Profile Verification</div>
		  </a>
      </div>
      <div class="acc-ou-2">
		  <a href="{{ url('/user/logout') }}">
			 <div class="@if(Request::segment(2)=='account') {{ acc-ou-1-1 }} @else acc-ou-2-2 @endif">Logout</div>
		  </a>
      </div>
   </div>
   <div class="clear"></div>
   <div class="clear"></div>
   <div class="prof_verf">
      <h3>Profile Verification</h3>
	  @if(isset(auth::user()->is_verified))
		  @if(auth::user()->is_verified==1)
			<span class="unspa">Verified</span>
		  @else
			  <span class="unspa">Unverified</span>
		  @endif
	  @endif
      <div class="clear"></div>
      <p><span>*</span>Please be sure to use your real identity, the platform will encrypt your identity information, which will be stored and automatically audited; even if the platform staff can not view, please rest assured that it is filled in.</p>
   </div>
   <div class="clear"></div>
   <script  src="script.js"></script>
   <!-------------------1--->
   <div class="packages-bgg" style="text-align:center;">
   <form action="{{ url('/user/profile-verification') }}" method="post" enctype="multipart/form-data">@csrf
      <div class="package-1" style="padding:20px;">
         <div class="packout_det">
            <div class="packout_det1">
               <p>Please select ID type: <span>*</span></p>
               <div class="selcText">
                  <select class="enq-input" name="card_type" id="card_type" required>
					<option value="1" @if(isset(auth::user()->card_type)) @if(auth::user()->card_type==1) {{ "selected" }} @endif @endif>Aadhar Card</option>
					<option value="2" @if(isset(auth::user()->card_type)) @if(auth::user()->card_type==2) {{ "selected" }} @endif @endif>Pan Card</option>
					<option value="3" @if(isset(auth::user()->card_type)) @if(auth::user()->card_type==3) {{ "selected" }} @endif @endif>Passport</option>
					<option value="4" @if(isset(auth::user()->card_type)) @if(auth::user()->card_type==4) {{ "selected" }} @endif @endif>ID Card</option>
					<option value="5" @if(isset(auth::user()->card_type)) @if(auth::user()->card_type==5) {{ "selected" }} @endif @endif>Driving License</option>
                  </select>
               </div>
            </div>
         </div>
         <div class="clearfix"></div>
         <!--1-->
		 
         <div class="profouter">
            <h3>Picture of Your ID (Front page)</h3>
            <p><span>*</span> Please make sure that the photo is complete and clearly visible, in .jpg or .png format. Passport must be in the valid period.</p>
            <div class="clearfix"></div>
            <div class="outericons">
               <div class="outericons1">
                  <div class="upload_fun imageUploadForm imageUploadForm3">
                        <input type='file' id="file" name="card_front" class="uploadButton" accept="image/*" />
                        <div id="uploadedImg" class="uploadedImg">
                           <span class="unveil"></span>
                        </div>
                  </div>
                  <div class="clearfix"></div>
                  <p><span>*</span> image Format in .jpg or .png.</p>
               </div>
               <div class="outericons1">
                  <div class="upload_fun1">
					@if(isset(auth::user()->card_front)) 
						@if(auth::user()->card_front!='')
							<img src="{{ asset('storage/card/'.auth::user()->card_front) }}" />
						@else
							<img src="images/verf1.png" />
						@endif
					@endif
                  </div>
               </div>
            </div>
         </div>
         <!--1-->
         <div class="clearfix"></div>
         <!--1-->
         <div class="profouter">
            <h3>Picture of Your ID (Back page)</h3>
            <p><span>*</span> Please make sure that the photo is complete and clearly visible, in .jpg or .png format. Passport must be in the valid period.</p>
            <div class="clearfix"></div>
            <div class="outericons">
               <div class="outericons1">
                  <div class="upload_fun imageUploadForm imageUploadForm3">
                        <input type='file' id="file" name="card_back" class="uploadButton" accept="image/*" />
                        <div id="uploadedImg" class="uploadedImg">
                           <span class="unveil"></span>
                        </div>
                  </div>
                  <div class="clearfix"></div>
                  <p><span>*</span> image Format in .jpg or .png.</p>
               </div>
               <div class="outericons1">
                  <div class="upload_fun1">
					@if(isset(auth::user()->card_back)) 
						@if(auth::user()->card_back!='')
							<img src="{{ asset('storage/card/'.auth::user()->card_back) }}" />
						@else
							<img src="images/verf1.png" />
						@endif
					@endif
                  </div>
               </div>
            </div>
         </div>
         <!--1-->
         <div class="clearfix"></div>
         <!--1-->
         <div class="profouter">
            <h3>Your head shot holding biographical page of your ID</h3>
            <p><span>*</span> Please upload a picture of yourself holding biographical page of your ID with your personal signature should contain <br /><b style="color:#000">Bit2atm</b> and <b style="color:#000">current date</b> of <b style="color:#000">signature</b>. Please make sure the contents of picture is clearly visible</p>
            <div class="clearfix"></div>
            <div class="brdbox">Face clearly visible / ID number clearly visible / Writing clearly visible / Note with word Bit2atm and today's date</div>
            <div class="outericons">
               <div class="outericons1">
                  <div class="upload_fun imageUploadForm imageUploadForm3">
                    
                        <input type='file' id="file" class="uploadButton" accept="image/*" name="card_selfie"/>
                        <div id="uploadedImg" class="uploadedImg">
                           <span class="unveil"></span>
                        </div>
                  </div>
                  <div class="clearfix"></div>
                  <p><span>*</span> image Format in .jpg or .png.</p>
               </div>
               <div class="outericons1">
                  <div class="upload_fun1">
					@if(isset(auth::user()->card_selfie)) 
						@if(auth::user()->card_selfie!='')
							<img src="{{ asset('storage/card/'.auth::user()->card_selfie) }}" />
						@else
							<img src="images/verf1.png" />
						@endif
					@endif
                  </div>
               </div>
            </div>
         </div>
         <!--1-->
         <div class="clearfix"></div>
         <div class="col-md-3">
         </div>
         <div class="col-md-6">
            <div class="sub-ouo">
               <input type="submit" value="Submit" style=" width:auto" id="submit" name="register" class="form-btnn semibold">
            </div>
            <div>
            </div>
         </div>
         <!-------------------1--->
      </div>
	  </form>
   </div>
</div>
<!--body-end--->
@endsection
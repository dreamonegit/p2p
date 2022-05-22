@extends('userlayouts.layouts.header_auth')

@section('content')

<body>

<div class="header-out-1">
<div class="container">

@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
<!-------------------2--->
<div class="package-2">

<div class="package-title">
Personal Information
</div>



<div class="e-ou-space">

<form action="{{ url('user-profile') }}" method="post">
@csrf
@if(isset($user))
							<input type="hidden" name="hid" value="{{ $user->id }}"> 
						@endif
					
<div class="col-md-4">		
<div class="contact_title">
Nick Name 
</div>
			
<input type="text" class="enq-input" name="nickname" placeholder="Nick Name" value="{{ $user->nickname }}" >
</div>





<div class="col-md-4">		
<div class="contact_title">
Email Address <span>*</span>
</div>
<input type="email" class="enq-input" name="email" placeholder="Email" value="{{ $user->email }}" disabled>
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

</div>
</div>
</body>
@endsection
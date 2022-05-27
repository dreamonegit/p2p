@extends('userlayouts.layouts.header_auth')
@section('content')
<!--header-end--->
<div class="clear"></div>
<!--body-start--->
<div class="header-out-1">
<div class="container">
<div class="bankouter">		
<!-------------------2--->
<div class="package-2">

<div class="package-title">
Bank Trasfer Details
</div>



<form action="{{ url('/user/bank_details') }}" method="post" enctype="multipart/form-data"> @csrf

<div class="e-ou-space">
<div class="col-md-12">		
<div class="contact_title ">
Account Holder Name <span>*</span>
</div>
			
<input type="text" class="enq-input" name="holder_name" placeholder="Account Holder Name" required>
</div>


<div class="col-md-12">		
<div class="contact_title">
Account No. <span>*</span>
</div>
			
<input type="text" class="enq-input" name="account_no" placeholder="Enter your bank account number" required>
</div>


<div class="col-md-12">		
<div class="contact_title">
Confirm Account No. <span>*</span>
</div>
			
<input type="text" class="enq-input" name="confirm_account_no" placeholder="Enter your confirm bank account number" required>
</div>




<div class="col-md-12">		
<div class="contact_title">
IFSC Code <span>*</span>
</div>
<input type="text" class="enq-input" name="ifsc_code" placeholder="Enter your IFSC code" required>
</div>


<div class="col-md-12">		
<div class="contact_title">
Account Type <span>*</span>
</div>
<select class="enq-input" name="account_type" required>
<option value="">-- Select Account Type --</option>
<option value="1" @if(isset($bank_details))@if($bank_details->account_type==1) {{ "selected" }} @endif @endif>Savings Account</option>
<option value="2" @if(isset($bank_details))@if($bank_details->account_type==2) {{ "selected" }} @endif @endif>Current Account</option>
</select>
</div>	
    				




<div class="col-md-12">		
<div class="contact_title">
Bank Name <span>*</span>
</div>

 <input class="enq-input" name="bank_name" type="text" placeholder="Please specify the account type (savings or current)"  required=""> 
</div>
</div>
<div class="clearfix"></div>
 <div class="tipsOuter">
<h4>Tips</h4>
<p>Tips: When you sell your crptocurrency the added payment menthod will be shown to the buyer during the transaction. To accepat cash transfer please make sure the information is correct.</p>
 </div>
 <div class="clearfix"></div>
 <div class="col-md-12">   
     <div class="sub-ouo">
    <input type="reset" value="Cancel"  style="width:auto;display:inline-block;background: none; border:1px solid #ccc;"  id="submit" name="register" class="form-btnn semibold" >
	<input type="submit" value="Confirm"  style="width:auto;display:inline-block;"  id="submit" name="register" class="form-btnn semibold" >
		</div>			 
 </div>    
 </form>   
 </div>
 </div>
</div>
</div>
@endsection











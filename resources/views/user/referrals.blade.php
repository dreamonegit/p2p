@extends('userlayouts.layouts.header_auth')
@section('content')
<!--body-start--->
<div class="header-out-1">
   <div class="container">
      <div class="col-md-6">
         <!--<div class="acc-ou-1">
            <div class="acc-ou-1-1">Account</div>
            </div>
            
            <div class="acc-ou-2">
            <div class="acc-ou-2-2">Profile Verification</div>
            </div>-->
      </div>
      <div class="col-md-6">
         <div class="acc-ou-3">
            <div class="acc-ou-3-3-text">Your ID :<span>{{ auth::user()->id }}</span></div>
            <div class="acc-ou-3-3"> <span>Invite - {{ count($refuser) }}</span> <img src="images/Layer 895.png" /></div>
         </div>
      </div>
      <div class="wish-head-out-1">
         <div class="col-md-7">
            <div class="news-intex-text">
               Referral Link :
            </div>
            <div class="news-intex">
               <form action="" method="post" name="s1" id="s1" style="
                  position:relative;">
                  <input class="search-box" name="semail" placeholder="" required="" type="text" value="{{ url('/signup?refcode='.auth::user()->id) }}" readonly>
                  <input type="submit" class="search-sub " value="Copy Link">
               </form>
            </div>
         </div>
         <div class="col-md-5">
            <div class="news-intex-text-2">
               Or
            </div>
            <div class="news-intex-2">
               <form action="" method="post" name="s1" id="s1" style="
                  position:relative;">
                  <input class="search-box" name="semail" placeholder="Enter Email Address" required="" type="email">
                  <input type="submit" class="search-sub " value="Send">
               </form>
            </div>
         </div>
      </div>
      <div class="wish-head-out-2">
         <div class="col-md-4">
            <div class="package-title-subbbb">
               <span><img src="images/round-1.png"></span> 
               <div class="acc-ou-10">
                  <p></p>
                  <div class="acc-ou-10-10">  Register and get your exclusive Link</div>
               </div>
            </div>
         </div>
         <div class="col-md-3">
            <div class="package-title-subbbb">
               <span><img src="images/round-2.png"></span> 
               <div class="acc-ou-10">
                  <p></p>
                  <div class="acc-ou-10-10">  Invite friends to register</div>
               </div>
            </div>
         </div>
         <div class="col-md-4">
            <div class="package-title-subbbb">
               <span><img src="images/round-3.png"></span> 
               <div class="acc-ou-10">
                  <p></p>
                  <div class="acc-ou-10-10">  Earn commission rewards from inviting friends</div>
               </div>
            </div>
         </div>
         <div class="col-md-1">
            <div class="package-title-into">
               <img src="images/close-icon.png">
            </div>
         </div>
      </div>
      <!-------------------1--->

      <div class="ref-1">
         <div class="ref-title">Referral Friends</div>
			<table id="example" class="table table-striped table-bordered" style="width:100%">
					<thead>
						<tr style="background: #1abb97;color: #fff;">
							<th>#</th>
							<th>E-mail</th>
							<th>Status</th>
						</tr>
					</thead>
					<tbody>
						@php $s=1 @endphp
						@foreach($refuser as $refuserval)
						<tr>
							<td>{{ $s }}</td>
							<td>{{ $refuserval->email }}</td>
							@if($refuserval->is_verified==1)
								<td><button type="button" class="btn btn-success btn-sm">Active</button></td>
							@else
								<td><button type="button" class="btn btn-danger btn-sm">Not Verified</button></td>
							@endif
						</tr>
						@php $s++ @endphp
						@endforeach
					</tbody>
					<tfoot>
						<tr style="background: #1abb97;color: #fff;">
							<th>#</th>
							<th>E-mail</th>
							<th>Status</th>
						</tr>
					</tfoot>
				</table>
         <div class="col-md-4"></div>
      </div>
      <!-------------------1--->
      <!-------------------2--->
      <div class="ref-1">
         <div class="ref-title">Referral Commission History</div>
         <div class="ref-title-2-out">
            <div class="col-md-2">
               <div class="ref-title-2">#</div>
            </div>
            <div class="col-md-4">
               <div class="ref-title-2">Referral Email Address</div>
            </div>
            <div class="col-md-3">
               <div class="ref-title-2">Commission</div>
            </div>
            <div class="col-md-3">
               <div class="ref-title-2">Date & Time</div>
            </div>
         </div>
         <div class="ref-title-3-out">
            <div class="ref-ic">
               <img src="images/Layer 898.png" />
            </div>
            <span>No data found in table</span>
         </div>
         <div class="col-md-4"></div>
         <div class="col-md-4">
            <div class="ref-ou-1">
               <div class="ref-ou-1-0">Previous</div>
               <div class="ref-ou-1-1">Next</div>
            </div>
         </div>
         <div class="col-md-4"></div>
      </div>
      <!-------------------2--->
      <!-------------------3--->
      <div class="ref-2">
         <div class="ref-title">Greatest Rewards Rules</div>
         <div class="ref-title-4-out">
            <div class="ref-ic">
               <img src="images/Layer 914.png" />
            </div>
         </div>
         <div class="body-pac-head-2">
            <span>Users who invite people to register on Bit2atm during this event can enjoy 18% of the transaction fee of the invitees</span>
            * The referer cannot get the reward amount unless referee use the link provided.
         </div>
      </div>
      <!-------------------3--->
   </div>
</div>
<!--body-end--->
<script>
$(document).ready(function () {
    $('#example').DataTable();
});
</script>
@endsection
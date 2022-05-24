@extends('userlayouts.layouts.header_auth')
@section('content')
<?php use App\Models\Coin; ?>
<div class="clear"></div>
<!--body-start--->
<div class="header-out-1">
   <div class="container">
      <div class="col-md-12">
         <div class="acc-ou-2">
            <a href="{{ url('/user/account') }}">
               <div class="@if(Request::segment(2)=='account') {{ 'acc-ou-1-1' }} @else acc-ou-2-2 @endif">Account</div>
            </a>
         </div>
         <div class="acc-ou-2">
            <a href="{{ url('/user/profile-verification') }}">
               <div class="@if(Request::segment(2)=='profile-verification') {{ 'acc-ou-1-1' }} @else acc-ou-2-2 @endif">Profile Verification</div>
            </a>
         </div>
         <div class="acc-ou-2">
            <a href="{{ url('/user/wallet') }}">
               <div class="@if(Request::segment(2)=='wallet') {{ 'acc-ou-1-1' }} @else acc-ou-2-2 @endif">Wallet</div>
            </a>
         </div>
         <div class="acc-ou-2">
            <a href="{{ url('/user/deposit-history') }}">
               <div class="@if(Request::segment(2)=='deposit-history') {{ 'acc-ou-1-1' }} @else 'acc-ou-2-2' @endif">Deposit History</div>
            </a>
         </div>
         <div class="acc-ou-2">
            <a href="{{ url('/user/logout') }}">
               <div class="acc-ou-2-2">Logout</div>
            </a>
         </div>
      </div>
      <div class="col-md-6">
      </div>
      <div class="package-2">
         <div class="package-title">
            Deposit Information
         </div>
         <div class="e-ou-space">
			 <div class="exchange-package-4">
				<table class="small_tb1" cellspacing="4px" cellpadding="4px" border="0">
				   <tbody>
				   <tr>
					  <th colspan="">
						 <div class="excc-border-1">#</div>
					  </th>
					  <th colspan="">
						 <div class="excc-border-1">Coin</div>
					  </th>
					  <th colspan="">
						 <div class="excc-border-1">Qty <img src="{{ asset('user/images/Layer 694.png') }}" /></div>
					  </th>
					  <th colspan="">
						 <div class="excc-border-1">Amount <img src="{{ asset('user/images/Layer 694.png') }}" /></div>
					  </th>
					  <th colspan="">
						 <div class="excc-border-1">Action</div>
					  </th>
				   </tr>
				   <?php $s=1; ?>
				   @foreach($deposithistory as $deposithistoryval)
						<?php
							$coinimage = Coin::getcoinimage($deposithistoryval->coin_id);
							
							$coindetail = Coin::getcoinname($deposithistoryval->coin_id);
						?>
					   <tr>
						  <td>
							 <div class="exc-border--2">{{ $s }}</div>
						  </td>
						  <td>
							 <div class="package-title-exc">
								<span><img src="{{ asset('storage/coin/'.$coinimage) }}"></span> 
								<div class="exc-acc-ou-10">
								   <div class="exc-acc-ou-10-10"> {{ $coindetail['coinname'] }} ( {{ $coindetail['symbol']  }})</div>
								</div>
							 </div>
						  </td>
						  <td>
							 <div class="exc-border--3">{{ $deposithistoryval->qty }}
								
							 </div>
						  </td>
						  <td>
							 <div class="exc-border--3">{{ $deposithistoryval->amount }}
								
							 </div>
						  </td>
						  <td>
							<div class="exc-border--3"><button type="button" class="btn btn-danger btn-sm">Pending</button></div>
						  </td>
					   </tr>
					   <?php $s++; ?>
				   @endforeach
				   </tbody>
				</table>
			 </div>            
         </div>
         <div class="clearfix"></div>
      </div>
   </div>
</div>
<!--body-end--->

@endsection
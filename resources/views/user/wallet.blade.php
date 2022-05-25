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
               <div class="@if(Request::segment(2)=='wallet') {{ 'acc-ou-1-1' }} @else 'acc-ou-2-2' @endif">Wallet</div>
            </a>
         </div>
         <div class="acc-ou-2">
            <a href="{{ url('/user/deposit-history') }}">
               <div class="@if(Request::segment(2)=='deposit-history') {{ 'acc-ou-1-1' }} @else acc-ou-2-2 @endif">Deposit History</div>
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
            Wallet Information
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
						 <div class="excc-border-1">Coin <img src="{{ asset('user/images/Layer 694.png') }}" /></div>
					  </th>
					  <th colspan="">
						 <div class="excc-border-1">Balance <img src="{{ asset('user/images/Layer 694.png') }}" /></div>
					  </th>
					  <th colspan="">
						 <div class="excc-border-1">Action</div>
					  </th>
				   </tr>
				   <?php $s=1; ?>
				   @foreach($wallet as $walletval)
						<?php
							$coinimage = Coin::getcoinimage($walletval->coin_id);
							
							$coindetail = Coin::getcoinname($walletval->coin_id);
							
							$need_deposite = Coin::getneeddeposit($walletval->coin_id);
							
							if($need_deposite==0){
								$need_deposite = '<a href="javascript:void(0)"> <div class="exxc-acc-ou-1-1" style="background-color:gray">Deposit</div></a>';
							}else{
								$need_deposite = '<a href="'.url('/user/deposit/'.$walletval->id).'"> <div class="exxc-acc-ou-1-1 deposit">Deposit</div></a>';
							}
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
							 <div class="exc-border--3">{{ $walletval->qty }}( {{ $coindetail['symbol']  }})
								
							 </div>
						  </td>
						  <td>
							 <div class="exc-border--4">
									@if(auth::user())
										<?php echo $need_deposite ?>
										<a href="#">
										   <div class="exxc-acc-ou-2-2 withdraw">Withdraw</div>
										</a>
									@else
										<a href="#">
										   <div class="exxc-acc-ou-1-1 deposit">Deposit</div>
										</a>
										<a href="#">
										   <div class="exxc-acc-ou-2-2 withdraw">Withdraw</div>
										</a>						
									@endif
							 </div>
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
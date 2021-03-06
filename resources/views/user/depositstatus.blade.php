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
						 <div class="excc-border-1">Exchange type</div>
					  </th>
					  
					  <th colspan="">
						 <div class="excc-border-1">Deposit Currency</div>
					  </th>
					  <th colspan="">
						 <div class="excc-border-1">Deposit Coin <img src="{{ asset('user/images/Layer 694.png') }}" /></div>
					  </th>
					  <th colspan="">
						 <div class="excc-border-1">Requested Date</div>
					  </th>
					  <th colspan="">
						 <div class="excc-border-1">Status</div>
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
							 <div class="exc-border--2">{{ $deposithistoryval->type }}</div>
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
							 <div class="exc-border--3">{{ $deposithistoryval->qty }} {{ $coindetail['symbol'] }}
								
							 </div>
						  </td>
						  <td>
							 <div class="exc-border--3">{{ date('Y-m-d H:i:s',strtotime($deposithistoryval->created_at)) }}
								
							 </div>
						  </td>
						  <td>
							@if($deposithistoryval->approved==1)
								<div class="exc-border--3"><button type="button" class="btn btn-success btn-sm">Approved</button></div>
							@elseif($deposithistoryval->approved==2)
								<div class="exc-border--3"><button type="button" class="btn btn-danger btn-sm">Rejected</button></div>
							@else
								<div class="exc-border--3"><button type="button" class="btn btn-info btn-sm">Not Verified</button></div>
							@endif
						  </td>
						  <td>
							@if($deposithistoryval->approved==1 || $deposithistoryval->transaction_id!='')
								<div class="exc-border--3"><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal{{$deposithistoryval->id}}">View</button></div>
							@else
								
								<div class="exc-border--3"><button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#myModal{{$deposithistoryval->id}}">Edit</button></div>
							@endif
						  </td>
					   </tr>
					   <?php $s++; ?>
						<div class="modal fade" id="myModal{{$deposithistoryval->id}}" role="dialog">
						   <div class="modal-dialog modal-xl">
							  <div class="modal-content">
								 <div class="modal-header" style=" height:50px;">
									Deposit Information!
									<button type="button" class="close" style="height:35px; width:35px; float:right;" data-dismiss="modal">&times;</button>
								 </div>
								 <form action="{{ url('/user/updatestatus') }}" method="post">@csrf
									<input type="hidden" name="hid" value="{{ $deposithistoryval->id }}">
									 <div class="modal-body">
										<dl class="row">
											<dt class="col-sm-4" style="font-weight: bold;">Exchange type</dt>
											<dd class="col-sm-8">Deposit</dd>
										</dl><br>
										<dl class="row">
											<dt class="col-sm-4" style="font-weight: bold;">Requested Date</dt>
											<dd class="col-sm-8">{{ date('Y-m-d H:i:s',strtotime($deposithistoryval->created_at)) }}</dd>
										</dl><br>
										<dl class="row">
											<dt class="col-sm-4" style="font-weight: bold;">Deposit Currency</dt>
											<dd class="col-sm-8">{{ $coindetail['coinname'] }} ( {{ $coindetail['symbol']  }})</dd>
										</dl><br>
										<dl class="row">
											<dt class="col-sm-4" style="font-weight: bold;">Deposit Coin</dt>
											<dd class="col-sm-8">{{ $deposithistoryval->qty }} ( {{ $coindetail['symbol']  }})</dd>
										</dl><br>
										<dl class="row">
											<dt class="col-sm-4" style="font-weight: bold;">Transaction #ID</dt>
											@if($deposithistoryval->transaction_id!='')
												<dd class="col-sm-8"> <input type="text" class="enq-input" readonly name="transaction_id" placeholder="Transaction #ID" value="{{ $deposithistoryval->transaction_id}}"></dd>
											@else
												<dd class="col-sm-8"> <input type="text" class="enq-input" required name="transaction_id" placeholder="Transaction #ID"></dd>
											@endif
										</dl>
										<dl class="row">
											<dt class="col-sm-4" style="font-weight: bold;">Status</dt>
											@if($deposithistoryval->approved==1)
												<dd class="col-sm-8"><button type="button" class="btn btn-success btn-sm">Approved</button></dd>
											@elseif($deposithistoryval->approved==2)
												<dd class="col-sm-8"><button type="button" class="btn btn-danger btn-sm">Rejected</button></dd>
											@else
												<dd class="col-sm-8"><button type="button" class="btn btn-info btn-sm">Not Verified</button></dd>
											@endif
										</dl><br>
									 </div>
									<div class="modal-footer">
										<button type="submit" class="btn btn-success" name="submit">Update</button>
										<button type="button" class="btn btn-danger deposit_button" data-dismiss="modal">Close!</button>
									</div>
								</form>
							  </div>
						   </div>
						</div>
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
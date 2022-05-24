@extends('userlayouts.layouts.header_auth')
@section('content')
<body>
   <div class="exc-box-0">
      <!--portfolio-start--->
      <div class="excc-1">
         <div class="eexc-head-text">
            Coin Balance
         </div>
         <div class="excc-acc-ou-4-4"> <img style="margin-top: -4px; padding-top: 0px; float: left; padding-right: 10px;" src="images/download-icon.png"> Download</div>
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
                     <div class="excc-border-1">Total Balance <img src="{{ asset('user/images/Layer 694.png') }}" /></div>
                  </th>
                  <th colspan="">
                     <div class="excc-border-1">Action</div>
                  </th>
               </tr>
			   @foreach($coin as $coinval)
				   <tr>
					  <td>
						 <div class="exc-border--2">1</div>
					  </td>
					  <td>
						 <div class="package-title-exc">
							<span><img src="{{ asset('storage/coin/'.$coinval->image) }}"></span> 
							<div class="exc-acc-ou-10">
							   <div class="exc-acc-ou-10-10">  {{ $coinval->coinname }}({{ $coinval->symbol }})</div>
							</div>
						 </div>
					  </td>
					  <td>
						 <div class="exc-border--3">{{ $coinval->total_volume }} {{ $coinval->symbol }}
							<span>˜ &#8377; {{ number_format($coinval->total_amount,2) }}</span>
						 </div>
					  </td>
					  <td>
						 <div class="exc-border--4">
							@if(auth::user())
								
								<a href="{{ url('/user/deposit/'.$coinval->id) }}">
								   <div class="exxc-acc-ou-1-1 deposit">Deposit</div>
								</a>
								<a href="{{ url('/user/withdraw/'.$coinval->id) }}">
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
			   @endforeach
               </tbody>
            </table>
         </div>
         <div class="excc-bpx-1">
            {!! $coin->links() !!}
         </div>
      </div>
      <!--portfolio-end--->
   </div>
</body>
@endsection
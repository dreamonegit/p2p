@extends('userlayouts.layouts.header_auth')
@section('content')
<style>
.small-box {
    border-radius: 0.25rem;
    box-shadow: 0 0 1px rgb(0 0 0 / 13%), 0 1px 3px rgb(0 0 0 / 20%);
    display: block;
    margin-bottom: 20px;
    position: relative;
}
.bg-info, .bg-info>a {
    color: #fff!important;
}
.small-box>.inner {
    padding: 10px;
}
.bg-info {
    background-color: #17a2b8!important;
}
.bg-success {
    background-color: #28a745!important;
}
.bg-danger {
    background-color: #dc3545!important;
}
.small-box:hover {
    text-decoration: none;
}
.bg-info, .bg-info>a {
    color: #fff!important;
}
.bg-danger, .bg-danger>a {
    color: #fff!important;
}
.bg-success, .bg-success>a {
    color: #fff!important;
}
.small-box>.small-box-footer {
    background-color: rgba(0,0,0,.1);
    color: rgba(255,255,255,.8);
    display: block;
    padding: 3px 0;
    position: relative;
    text-align: center;
    text-decoration: none;
    z-index: 10;
}
</style>
	<?php use App\Models\Deposit; ?>
<div class="clear"></div>
<!--body-start--->
   <div class="container">
   <div class="exc-1">
      <div class="exc-title">Current Portfolio Value (Approx) 	<span>&#8377; {{ number_format(Deposit::getmyportpolio(),2) }} </span></div>
   </div>
   </div>
<div class="clear"></div>
<div class="container">
	<div class="exc-1">
<div class="row" style="margin-top: 12px;">
            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ Deposit::getdepositrequest() }}</h3>
                        <p>Total Deposit Request</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-archive"></i>
                    </div>
                    <a href="{{ url('/user/deposit-history') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>0</h3>
                        <p>Total Swap Request</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-exchange-alt"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>0</h3>
                        <p>Total Withdraw Request</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-coins"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            
        </div>	
	</div>
   <!--portfolio-start--->

   <!--portfolio-end--->
   <div class="exc-box-1">
      <!--portfolio-start
      <div class="excc-1">
         <div class="exc-select-box">
            <button name="service" id="service" class="enq-input city-space-2"  style="text-align:left;"data-toggle="modal" data-target="#myModal" >Select your coins *</button>
            <!--<select name="service" id="service" class="enq-input city-space-2" data-toggle="modal" data-target="#myModal" required="">
               <option value="" selected="" disabled=""></option>
               </select>-
         </div>
         <div class="excc-head-text">
            Fees: 0%
         </div>
         <div class="excc-head-text-2">
            <span>Min</span> 0.1 INR  <span>|  Max </span> 1,50,000 INR
         </div>
         <div class="exc-ref-ou-1">
            <div class="exc-ref-ou-1-0">BUY</div>
            <div class="exc-ref-ou-1-1">SELL</div>
         </div>
         <div class="qty-tot-text"> 1 TRX = 6.479 INR</div>
         <div class="exc-contact_title">
            Quantity ( TRX )
         </div>
         <input type="text" class="exc-enq-input" name="qty" pattern="[0-9]{}" placeholder="Quantity" required="">
         <div class="exc-contact_title">
            Total ( INR )
         </div>
         <input type="text" class="exc-enq-input" name="tot" pattern="[0-9]{}" placeholder="Total" required="">
         <div class="exccc-head-text-2">
            <span>Avl. Balance:</span> 0.00
         </div>
         <div class="excc-ref-ou-1">
            <div class="excc-ref-ou-1-1">Instant Sell Coin</div>
         </div>
      </div>-->
      <!--portfolio-end--->
   </div>
   <!--<div class="exc-box-2">
      <!--portfolio-start---
      <div class="excc-1">
         <div class="eexc-head-text">
            Coin Balance
         </div>
         <div class="excc-acc-ou-4-4"> <img style="margin-top: -4px; padding-top: 0px; float: left; padding-right: 10px;" src="{{ asset('user/images/download-icon.png') }}"> Download</div>
         <div class="exchange-package-4">
            <table class="small_tb1" cellspacing="4px" cellpadding="4px" border="0">
               <tbody>
                  <tr>
                     <td>
                        <div class="exchange-border-2">Date &amp; Tim</div>
                     </td>
                     <td>
                        <div class="exchange-border-2">Quantity</div>
                     </td>
                     <td>
                        <div class="exchange-border-2">Coin Pair</div>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div class="exchange-border-3">2021-06-01 10:47:55</div>
                     </td>
                     <td>
                        <div class="exchange-border-3"><span>782.4000 BTT</span></div>
                     </td>
                     <td>
                        <div class="exchange-border-3">BTT/INR</div>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div class="exchange-border-3-1">2021-06-01 10:47:55</div>
                     </td>
                     <td>
                        <div class="exchange-border-3-1"><span>782.4000 BTT</span></div>
                     </td>
                     <td>
                        <div class="exchange-border-3-1">BTT/INR</div>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div class="exchange-border-3">2021-06-01 10:47:55</div>
                     </td>
                     <td>
                        <div class="active exchange-border-3"><span >782.4000 BTT</span></div>
                     </td>
                     <td>
                        <div class="exchange-border-3">BTT/INR</div>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div class="exchange-border-3-1">2021-06-01 10:47:55</div>
                     </td>
                     <td>
                        <div class="exchange-border-3-1"><span>782.4000 BTT</span></div>
                     </td>
                     <td>
                        <div class="exchange-border-3-1">BTT/INR</div>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div class="exchange-border-3">2021-06-01 10:47:55</div>
                     </td>
                     <td>
                        <div class="exchange-border-3"><span>782.4000 BTT</span></div>
                     </td>
                     <td>
                        <div class="exchange-border-3">BTT/INR</div>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div class="exchange-border-3-1">2021-06-01 10:47:55</div>
                     </td>
                     <td>
                        <div class="exchange-border-3-1"><span>782.4000 BTT</span></div>
                     </td>
                     <td>
                        <div class="exchange-border-3-1">BTT/INR</div>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div class="exchange-border-3">2021-06-01 10:47:55</div>
                     </td>
                     <td>
                        <div class=" active exchange-border-3"><span>782.4000 BTT</span></div>
                     </td>
                     <td>
                        <div class="exchange-border-3">BTT/INR</div>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div class="exchange-border-3-1">2021-06-01 10:47:55</div>
                     </td>
                     <td>
                        <div class="exchange-border-3-1"><span>782.4000 BTT</span></div>
                     </td>
                     <td>
                        <div class="exchange-border-3-1">BTT/INR</div>
                     </td>
                  </tr>
               </tbody>
            </table>
         </div>
         <div class="excc-bpx-1">
            <div class="excc-box-1-1"><</div>
            <div class="excc-box-1-1 active">1</div>
            <div class="excc-box-1-1">2</div>
            <div class="excc-box-1-1">3</div>
            <div class="excc-box-1-1">></div>
         </div>
      </div>
      <!--portfolio-end--
   </div>->
   <!--inr-balance
   <div class="exc-2">
      <div class="exc-package-4">
         <table class="small_tb1" cellspacing="4px" cellpadding="4px" border="0">
            <tbody>
               <tr>
                  <th colspan="2">
                     <div class="exc-border-1">Recent Login</div>
                  </th>
               </tr>
               <tr>
                  <td>
                     <div class="exc-border-2">INR Available balance</div>
                  </td>
                  <td>
                     <div class="exc-border-22">&#8377; 0.01</div>
                  </td>
               </tr>
               <tr>
                  <td>
                     <div class="exc-border-3">Total Balance</div>
                  </td>
                  <td>
                     <div class="exc-border-33">&#8377; 0.01</div>
                  </td>
               </tr>
            </tbody>
         </table>
         <div class="exc-ou">
            <div class="exc-acc-ou-1">
               <a href="#">
                  <div class="exc-acc-ou-1-1">INR Deposit ( &#8377; )</div>
               </a>
            </div>
            <div class="exc-acc-ou-2">
               <a href="#">
                  <div class="exc-acc-ou-2-2">INR Withdraw ( &#8377; )</div>
               </a>
            </div>
         </div>
      </div>
   </div>--->
   <!--inr-balance-end-->
   <!--coin-balance--->
   <div class="exc-3">
      <div class="exc-head-text">
         Coin Balance
      </div>
      <div class="exc-head-text-2">
         Hide zero balance
      </div>
      <form action="" method="post" name="f1" id="f1" class="exc_f1">
         <input type="search" class="exc-sear_text" placeholder="Coin Symbol">
         <input type="submit" class="exc-sear_box" value="">
      </form>
      <div class="excc-package-4">
         <table class="exc-small_tb1" cellspacing="4px" cellpadding="4px" border="0">
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
				   <?php 
						if($coinval->need_deposite==0){
							$need_deposite = '<a href="javascript:void(0)"> <div class="exxc-acc-ou-1-1" style="background-color:gray">Deposit</div></a>';
						}else{
							$need_deposite = '<a href="'.url('/user/deposit/'.$coinval->id).'"> <div class="exxc-acc-ou-1-1 deposit">Deposit</div></a>';
						}
				   ?>
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
						 <div class="exc-border--3">{{ Deposit::getcoincount($coinval->id) }} {{ $coinval->symbol }}
						 </div>
					  </td>
					  <td>
						 <div class="exc-border--4">
							@if(auth::user())
								<?php echo $need_deposite ?>
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
   </div>
   <!--coin-balance-end-->
</div>
<!--footer-end--->
<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header" style=" height:50px;">
            <button type="button" class="close" style="height:35px; width:35px; float:right;" data-dismiss="modal">&times;</button>
         </div>
         <div class="modal-body" style="height:690px;">
            <label class="control-label" style="margin-bottom:5px;">Select your coins</label>
            <select class="form-control" id="select2-single-box" name="select2-single-box" data-placeholder="Pick your choice" data-tabindex="1">
               <option></option>
               <option value="1INCH">1INCH</option>
               <option value="ADA">ADA</option>
               <option value="ALGO">ALGO</option>
               <option value="ATOM">ATOM</option>
               <option value="AVAX">AVAX</option>
               <option value="BNB">BNB</option>
               <option value="BTC">BTC</option>
               <option value="BTT">BTT</option>
               <option value="CAKE">CAKE</option>
               <option value="CELO">CELO</option>
               <option value="COTI">COTI</option>
               <option value="DASH">DASH</option>
               <option value="DENT">DENT</option>
               <option value="DOCK">DOCK</option>
               <option value="DODO">DODO</option>
               <option value="DOGE">DOGE</option>
               <option value="DOT">DOT</option>
               <option value="EGLD">EGLD</option>
            </select>
         </div>
      </div>
   </div>
</div>
</div>
<script>
	$(".deposit").on("click", function(){
		document.location.href = '/signin'
	});

</script>
@endsection
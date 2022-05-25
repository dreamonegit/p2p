@extends('userlayouts.layouts.header_auth')
@section('content')
<div class="clear"></div>
<!--body-start--->
<div class="homebanner2_outer">
   <div class="container">
      <h2>Deposit</h2>
   </div>
</div>
<div class="clear"></div>
<div class="container">
   <div class="exc-box-1">
      <!--portfolio-start-->
      <div class="excc-1">
         <div class="exc-ref-ou-1">
            <div class="exc-ref-ou-1-0"><a id="deposit">Deposit</a></div>

         </div>
		 <form id="exchange" method="post" action="{{ url('/user/deposit') }}">@csrf
			<input type="hidden" name="existingcoin" value="{{ $id }}">
			<input type="hidden" name="coinprice" id="singlecoinprice">
			 <div class="depositopen show">
				<div class="row">
					<div class="form-group col-md-6">
					  <label class="required">Coin </label>
					  <select name="coin_id" class="enq-input city-space-2 coin"  data-action="deposit">
						 <option value="" selected="" disabled="">Select Coin</option>
						 @foreach($coin as $coinval)
							<option value="{{ $coinval->id }}">{{ $coinval->coinname }} ( {{ $coinval->symbol }} ) </option>
						 @endforeach
					  </select>
					</div>
					<div class="form-group col-md-6">
					  <label class="required">Deposit Coin</label>
					 <input type="text" class="enq-input qty" name="qty" placeholder="Quantity" onchange="amountcalculation(this);">
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-10">
					  <label class="required">Deposit Address</label>
					 <input type="text" class="enq-input" name="deposit_address" id="deposit_address" placeholder="Deposit Address">
					</div>
					<div class="form-group col-md-2">
						<a javascript:void(0) id="contentcopy" class="btn btn-primary" onclick="copyToClipboard('#deposit_address')" style="margin-top: 33px;background-color:#357ebd">Copy</a>
					</div>
					
				</div>
				<div class="row">
					<div id="qrcode"></div>
					<div id="totalamount"></div>
				</div>
				<div class="row">
					<div class="form-group col-md-12">
					 <button type="submit" class="btn btn-primary btn-deposit ex-deposit-btn" style="float:right" id="deposit_button">Deposit !</button>
					</div>
				</div>
			 </div>
			 <div class="swapopen hide">
				<div class="row">
					<div class="form-group col-md-6">
					  <label class="required">Coin </label>
						  <select name="sellcoin"  class="enq-input city-space-2 coin" data-action="sell">
							 <option value="" selected="" disabled="">Select Coin</option>
							 @foreach($coin as $coinval)
								<option value="{{ $coinval->id }}">{{ $coinval->coinname }} ( {{ $coinval->symbol }} ) </option>
							 @endforeach
						  </select>
					</div>
					<div class="form-group col-md-6">
					  <label class="required">Deposit Coin</label>
					 <input type="text" class="enq-input" id="sellqty" name="sellqty" placeholder="Quantity" >
					</div>
				</div>
				 <div class="excc-ref-ou-1">
					<div class="excc-ref-ou-1-1">Instant Sell Coin</div>
				 </div>
			</div>
		</form>
      </div>
      <!--portfolio-end--->
   </div>
</div>
<script>
	$("#deposit").on("click", function(){
		$('#exchange')[0].reset();
		$('#qrcode').html("");
		$('#contentcopy').text('Copy').css('background-color','#357ebd');
		$('.depositopen').removeClass('hide');
		$('.swapopen').removeClass('show').addClass('hide')
	});
	$("#swap").on("click", function(){
		$('#exchange')[0].reset();
		$('#qrcode').html("");
		$('#contentcopy').text('Copy').css('background-color','#357ebd');
		$('.depositopen').removeClass('show').addClass('hide');
		$('.swapopen').removeClass('hide')
	});	
	$(".coin").on("change", function(){
		var coin = $(this).val();
		var attr = $(this).attr('data-action');
		$.ajax({
			url: '/user/getcoinaddress',
			type: 'POST',
			data: {"_token": "{{ csrf_token() }}", "coin":coin},
			dataType: 'JSON',
			success: function (data) { 
				if(attr=='deposit'){
					$("#qrcode").html('<img src="'+data.url+'">'); 
					$('#deposit_address').val(data.address);
					$('#singlecoinprice').val(data.coinamount);
					if($('.qty').val()!=''){
						amountcalculation($('.qty').val());
					}
				}else{
					$('#sellqty').val(data.total_volume);
				}
			}
		});		
	});
	function amountcalculation(qty){
		var totalamount = parseInt($('#singlecoinprice').val()) * parseInt(qty.value);
		$('#totalamount').html('<label style="text-align:center;color:red">Total amount is INR '+totalamount+'</label>');		
	}
function copyToClipboard(element) {
  var $temp = $("<input>");
  $("body").append($temp);
  $temp.val($(element).val()).select();
  document.execCommand("copy");
  $temp.remove();
  $('#contentcopy').text('Copied!..').css('background-color','green');
}
</script>
@endsection
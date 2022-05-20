@include('layouts.elements.admin.header') 
    <div class="container-scroller">
      <!-- partial:../../partials/_navbar.html -->
      @include('layouts.elements.admin.nav') 
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:../../partials/_sidebar.html -->
        @include('layouts.elements.admin.sidebar')
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">Add Staff</h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                </ol>
              </nav>
            </div>
			@if ($errors->any())
				<div class="alert alert-danger">
					<ul>
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			@endif
            <div class="row">
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
					<form id="coin-form" action="{{ url('/admin/add-coin') }}" method="POST" enctype="multipart/form-data">@csrf
						@if(isset($coin))
							<input type="hidden" name="hid" value="{{ $coin->id }}"> 
						@endif
						<div class="row">
							<div class="form-group col-md-4">
							  <label class="required">Coin </label>
							  <input type="text" class="form-control form-control-lg" name="coinname" placeholder="Coin Name" aria-label="Coin Name" value="@if(isset($coin)){{ $coin->coinname }} @endif">
							</div>
							<div class="form-group col-md-4">
							  <label class="required">Symbol</label>
							  <input type="text" class="form-control form-control-lg" placeholder="Symbol" name="symbol" aria-label="Symbol" value="@if(isset($coin)){{ $coin->symbol }} @endif">
							</div>
							<div class="form-group col-md-4">
							  <label class="required">Coin ID (Coingecko ID)</label>
							  <input type="text" class="form-control form-control-lg" placeholder="Coin ID" name="coinid" aria-label="Coin ID" value="@if(isset($coin)){{ $coin->coinid }} @endif">
							</div>
						</div>
						<div class="row">
							<div class="form-group col-md-4">
							  <label class="required">Min Withdraw</label>
							  <input type="text" class="form-control form-control-lg" name="minwithdraw" placeholder="Min Withdraw" aria-label="Min Withdraw" value="@if(isset($coin)){{ $coin->minwithdraw }} @endif">
							</div>
							<div class="form-group col-md-4">
							  <label class="required">Max Withdraw</label>
							  <input type="text" class="form-control form-control-lg" placeholder="Max Withdraw" name="maxwithdraw" aria-label="Max Withdraw" value="@if(isset($coin)){{ $coin->maxwithdraw }} @endif">
							</div>
							<div class="form-group col-md-4">
							  <label class="required">Withdraw Fee</label>
							  <input type="text" class="form-control form-control-lg" placeholder="Withdraw Fee" name="withdrawfee" aria-label="Withdraw Fee" value="@if(isset($coin)){{ $coin->withdrawfee }} @endif">
							</div>
						</div>
						<div class="row">
							<div class="form-group col-md-12">
							  <label class="required">Deposit address</label>
							  <input type="text" class="form-control form-control-lg" name="depositaddress" placeholder="Deposit address" aria-label="Deposit address" value="@if(isset($coin)){{ $coin->depositaddress }} @endif">
							</div>
						</div>
						<div class="row">
							<div class="form-group col-md-12">
							  <label>Pricing & Other Options</label>
							</div>
						</div>
						<div class="row">
							<div class="form-group col-md-4">
							  <label class="required">INR to Coin Percentage</label>
							  <input type="text" class="form-control form-control-lg" name="inr_to_coin_percentage" placeholder="INR to Coin Percentage" aria-label="INR to Coin Percentage" value="@if(isset($coin)){{ $coin->inr_to_coin_percentage }} @endif">
							</div>
							<div class="form-group col-md-4">
							  <label class="required">Coin To INR Percentage</label>
							  <input type="text" class="form-control form-control-lg" placeholder="Coin To INR Percentage" name="coin_to_inr_percentage" aria-label="Coin To INR Percentage" value="@if(isset($coin)){{ $coin->coin_to_inr_percentage }} @endif">
							</div>
							<div class="form-group col-md-4">
							  <label class="required">Coin To Coin Percentage</label>
							  <input type="text" class="form-control form-control-lg" placeholder="Coin To Coin Percentage" name="coin_to_coin_percentage" aria-label="Coin To Coin Percentage" value="@if(isset($coin)){{ $coin->coin_to_coin_percentage }} @endif">
							</div>
						</div>
						<div class="row">
							<div class="form-group col-md-4">
							  <label class="required">Fetching From API :</label>
								<div class="form-check">
									<label class="form-check-label">
									<input type="radio" class="form-check-input" name="need_api" id="need_api" value="1" @if(isset($coin)) @if($coin->need_api==1) {{ "checked" }} @endif @endif>Enable <i class="input-helper"></i></label>
									</div>
									<div class="form-check">
									<label class="form-check-label">
									<input type="radio" class="form-check-input" name="need_api" id="need_api1" value="0" @if(isset($coin)) @if($coin->need_api==0) {{ "checked" }} @endif @endif>Disable <i class="input-helper"></i></label>
								</div>
							</div>
							<div class="form-group col-md-4">
							  <label class="required">Deposit Enable/ Disable :</label>
								<div class="form-check">
									<label class="form-check-label">
									<input type="radio" class="form-check-input" name="need_deposite" id="need_deposite" value="1" @if(isset($coin)) @if($coin->need_deposite==1) {{ "checked" }} @endif @endif>Enable <i class="input-helper"></i></label>
								</div>
								<div class="form-check">
									<label class="form-check-label">
									<input type="radio" class="form-check-input" name="need_deposite" id="need_deposite1" value="0" @if(isset($coin)) @if($coin->need_deposite==0) {{ "checked" }} @endif @endif>Disable <i class="input-helper"></i></label>
								</div>
							</div>
							<div class="form-group col-md-4">
							  <label class="required">Status:</label>
								<div class="form-check">
									<label class="form-check-label">
									<input type="radio" class="form-check-input" name="status" id="status" value="1" @if(isset($coin)) @if($coin->status==1) {{ "checked" }} @endif @endif>Enable <i class="input-helper"></i></label>
								</div>
								<div class="form-check">
									<label class="form-check-label">
									<input type="radio" class="form-check-input" name="status" id="status1" value="0" @if(isset($coin)) @if($coin->status==0) {{ "checked" }} @endif @endif>Disable <i class="input-helper"></i></label>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="form-group col-md-6">
							  <label class="required">INR Price:</label>
							  <input type="text" class="form-control form-control-lg" name="price" placeholder="INR Price:" aria-label="INR Price" value="@if(isset($coin)){{ $coin->price }} @endif">
							</div>
							<div class="form-group col-md-6">
							  <label class="required">Order Price</label>
							  <input type="text" class="form-control form-control-lg" placeholder="Order Price" name="order_price" aria-label="Order Price" value="@if(isset($coin)){{ $coin->order_price }} @endif">
							</div>
						</div>
						<div class="form-group">
						  <button type="submit" class="btn btn-primary button-right step-button" >Save</button>
						</div>
					</form>
                  </div>
				  
                </div>
				
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:../../partials/_footer.html -->
			@include('layouts.elements.admin.footer')
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
	@include('layouts.elements.admin.plugins')
	<script>
		 $('#coin-form').validate({ // initialize the plugin
			ignore: ".ignore",
			rules: {
				coinname: {
					required: true
				},
				symbol: {
				  required: true
				},
				coinid: {
					required: true
				},
				minwithdraw: {
					required: true
				},
				maxwithdraw: {
					required: true
				},
				withdrawfee: {
					required: true
				},
				depositaddress: {
					required: true
				},
				inr_to_coin_percentage: {
					required: true
				},
				coin_to_inr_percentage: {
					required: true
				},
				coin_to_coin_percentage: {
					required: true
				},
				need_api: {
					required: true
				},
				need_deposite: {
					required: true
				},
				price: {
					required: true
				},
				order_price: {
					required: true
				},
				status: {
					required: true
				}
			}
		});
	</script>
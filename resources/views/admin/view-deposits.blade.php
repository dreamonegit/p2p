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
              <h3 class="page-title">View User</h3>
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
					<form id="coin-form" action="{{ url('/admin/save-deposit') }}" method="POST" enctype="multipart/form-data">@csrf
					@if(isset($deposit))
					<input type="hidden" name="id" value="{{$deposit->id}}">
					@else
					<input type="hidden" name="id" value="0">
					@endif
						<div class="row">
							<div class="form-group col-md-4">
							  <label class="required">Quantity</label>
							  <input type="text" class="form-control form-control-lg" name="qty" placeholder="Qty" aria-label="Qty" value="@if(isset($deposit)){{ $deposit->qty }} @endif">
							</div>
							<div class="form-group col-md-4">
							  <label class="required">Amount</label>
							  <input type="text" class="form-control form-control-lg" placeholder="Amount" name="amount" aria-label="amount" value="@if(isset($deposit)){{ $deposit->amount }} @endif">
							</div>
							<div class="form-group col-md-4">
							  <label class="required">Deposit Address</label>
							  <input type="text" class="form-control form-control-lg" placeholder="Deposit Address" name="deposit_address" aria-label="Deposit Address" value="@if(isset($deposit)){{ $deposit->deposit_address }} @endif">
							</div>
						</div>
						<div class="row">
							<div class="form-group col-md-4">
							  <label for="exampleFormControlSelect1">Approved</label>
							  <select class="form-control form-control-lg" id="approved" name="approved">
								<option value="">------Choose Option------</option>
								<option value="1" @if(isset($deposit))@if($deposit->approved==1) {{ "selected" }} @endif @endif>success</option>
								<option value="2" @if(isset($deposit))@if($deposit->approved==2) {{ "selected" }} @endif @endif>Failed</option>
							  </select>
							</div>
                            <div class="form-group col-md-4">
							  <label for="exampleFormControlSelect1">Status</label>
							  <select class="form-control form-control-lg" id="status" name="status">
								<option value="">------Choose Option------</option>
								<option value="1" @if(isset($deposit))@if($deposit->status==1) {{ "selected" }} @endif @endif>Active</option>
								<option value="0" @if(isset($deposit))@if($deposit->status==0) {{ "selected" }} @endif @endif>In-Active</option>
							  </select>
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
$( function() {
	$( ".date_datepicker" ).datepicker();
    
	} );
	</script>
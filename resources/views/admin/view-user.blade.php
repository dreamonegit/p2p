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
					<form id="coin-form" action="{{ url('/admin/save-user') }}" method="POST" enctype="multipart/form-data">@csrf
					@if(isset($user))
					<input type="hidden" name="id" value="{{$user->id}}">
					@else
					<input type="hidden" name="id" value="0">
					@endif
						<div class="form-group">
						  <label class="required">E-mail</label>
						  <input type="text" class="form-control form-control-lg" placeholder="E-mail" name="email" aria-label="E-mail" value="@if(isset($user)){{ $user->email }} @endif">
						</div>
						<div class="form-group">
						  <label for="exampleFormControlSelect1">Status</label>
						  <select class="form-control form-control-lg" id="status" name="status">
							<option value="">------Choose Option------</option>
							<option value="1" @if(isset($user))@if($user->status==1) {{ "selected" }} @endif @endif>Active</option>
							<option value="0" @if(isset($user))@if($user->status==0) {{ "selected" }} @endif @endif>In-Active</option>
						  </select>
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
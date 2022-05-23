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
						<div class="row">
							<div class="form-group col-md-4">
							  <label class="required">Name</label>
							  <input type="text" class="form-control form-control-lg" name="name" placeholder="Name" aria-label="Name" value="@if(isset($user)){{ $user->name }} @endif">
							</div>
							<div class="form-group col-md-4">
							  <label class="required">Last Name</label>
							  <input type="text" class="form-control form-control-lg" placeholder="Last name" name="lname" aria-label="lname" value="@if(isset($user)){{ $user->lname }} @endif">
							</div>
							<div class="form-group col-md-4">
							  <label class="required">Date Of Birth</label>
							  <input type="text" class="form-control form-control-lg date_datepicker" placeholder="Date of Birth" name="bkdate" aria-label="Bkdate" value="@if(isset($user)){{ $user->bkdate }} @endif">
							</div>
						</div>
						<div class="row">
							<div class="form-group col-md-4">
							  <label class="required">Email</label>
							  <input type="text" class="form-control form-control-lg" name="email" placeholder="Email " aria-label="email" value="@if(isset($user)){{ $user->email }} @endif">
							</div>
							<div class="form-group col-md-4">
							  <label class="required">Mobile</label>
							  <input type="text" class="form-control form-control-lg" placeholder="Mobile" name="mobile" aria-label="mobile" value="@if(isset($user)){{ $user->mobile }} @endif">
							</div>
							<div class="form-group col-md-4">
							  <label class="required">Address</label>
							  <input type="text" class="form-control form-control-lg" placeholder="Address" name="address" aria-label="Address" value="@if(isset($user)){{ $user->address }} @endif">
							</div>
						</div>
						<div class="row">
						<div class="form-group col-md-4">
						  <label for="exampleFormControlSelect1">Status</label>
						  <select class="form-control form-control-lg" id="status" name="status">
							<option value="">------Choose Option------</option>
							<option value="1" @if(isset($user))@if($user->status==1) {{ "selected" }} @endif @endif>Active</option>
							<option value="0" @if(isset($user))@if($user->status==0) {{ "selected" }} @endif @endif>In-Active</option>
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
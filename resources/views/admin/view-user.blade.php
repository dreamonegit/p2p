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
					<form id="coin-form" action="{{ url('/admin/save-user') }}" method="POST" id="datepicker" enctype="multipart/form-data">@csrf
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
							  <input type="text" class="form-control form-control-lg" placeholder="Date of Birth" name="bkdate" aria-label="Bkdate" value="@if(isset($user)){{ $user->bkdate }} @endif">
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
							  <label class="required">Address1</label>
							  <input type="text" class="form-control form-control-lg" name="address1" placeholder="Address1 " aria-label="address1" value="@if(isset($user)){{ $user->address1 }} @endif">
							</div>
    						 <div class="form-group col-md-4">
        						<label class="required">Country</label>
        			           <select class="form-control form-control-lg" id="countries" name="country">
        				        <option value="">---Choose the Country ---</option>
								 @foreach($countries as $countriesvalue)
								   <option value="{{ $countriesvalue->id}}" @if(isset($user))@if($user->country==$countriesvalue->id) {{ "selected" }} @endif @endif>{{ $countriesvalue->nicename }} </option>
								    @endforeach
        						  </select>
    						</div>
							<div class="form-group col-md-4">
							  <label class="required">State</label>
							  <input type="text" class="form-control form-control-lg" name="state" placeholder="State " aria-label="state" value="@if(isset($user)){{ $user->state }} @endif">
							</div>
						</div>
						<div class="row">
							<div class="form-group col-md-4">
							  <label class="required">City</label>
							  <input type="text" class="form-control form-control-lg" name="city" placeholder="City" aria-label="city" value="@if(isset($user)){{ $user->city }} @endif">
							</div>
 							<div class="form-group col-md-4">
							  <label class="required">pin</label>
							  <input type="text" class="form-control form-control-lg" name="pin" placeholder="Pin" aria-label="city" value="@if(isset($user)){{ $user->pin }} @endif">
							</div>
					   <div class="form-group col-md-4">
						  <div class="required">
							 Gender
						  </div>
						  <select name="gender" id="service" class="form-control form-control-lg" required="">
							 <option value="">Select Gender</option>
							 <option value="1" @if(isset($user))@if($user->gender==1) {{ "selected" }} @endif @endif>Male </option>
							 <option value="2" @if(isset($user))@if($user->gender==2) {{ "selected" }} @endif @endif>Female</option>
							 <option value="3" @if(isset($user))@if($user->gender==3) {{ "selected" }} @endif @endif>Others</option>
						  </select>
					   </div>
						</div>
						<div class="row">
 							<div class="form-group col-md-4">
							  <label class="required">Referel Code</label>
							  <input type="text" class="form-control form-control-lg" value="@if(isset($user)){{ $user->refcode }} @endif" readonly>
							</div>
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
    $( "#datepicker" ).datepicker();
  } );
  </script>
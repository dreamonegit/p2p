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
              <h3 class="page-title"> List User </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                </ol>
              </nav>
            </div>
			
			
			
			<div class="row">

					<div class="form-group col-12" >
				<!--<a style="float:right;" href="{{ url('admin/add-coin') }}" class="p-3 btn btn-primary btn-fw">Add Coin</a>-->
					</div>	
			</div>

              <div class="col-12 grid-margin">

                <div class="card">
                  <div class="card-body">
					@if (\Session::has('message'))
						<div class="alert alert-success">
							<ul>
								<li>{!! \Session::get('message') !!}</li>
							</ul>
						</div>
					@endif
                    <div class="table-responsive">
                      <table class="table" id="liststaffTable">
                        <thead>
                          <tr>
                            <th> ID </th>
							<th>Name</th>
							<th>Last Name</th>
							<th>Date Of Birth</th>
							<th>Email</th>
							<th>Mobile</th>
							<th>Address</th>
							<th>Kyc Verification</th>
							<th>Status</th>
							<th> Edit </th>
							<th> Delete </th>
                          </tr>
                        </thead>
                        <tbody>
						@if($user->isNotEmpty($user))
							
							@foreach($user as $userval)
							  <?php
							  
									if($userval->card_type==1){
										$card_type = 'Aadhar Card';
									}elseif($userval->card_type==2){
										$card_type = 'Pan Card';
									}elseif($userval->card_type==3){
										$card_type = 'Passport';
									}elseif($userval->card_type==4){
										$card_type = 'ID Card';
									}elseif($userval->card_type==5){
										$card_type = 'Driving License';
									}else{
										$card_type = '';
									}
							  
							  ?>
							  <tr>
								  <td>
									{{ $userval->id }}
								  </td>
								  <td>
									{{ $userval->name  }}
								  </td>
								  <td>
									{{ $userval->lname  }}
								  </td>
								  <td>
									{{ $userval->bkdate  }}
								  </td>
								  <td>
									{{ $userval->email  }}
								  </td>
								  <td>
									{{ $userval->mobile  }}
								  </td>
								  <td>
									{{ $userval->address  }}
								  </td>
								  <td>
									@if($card_type!='')
										<button type="button" class="badge badge-success" data-bs-toggle="modal" data-bs-target="#myModal{{$userval->id}}">Verify</button>
									@else
										<button type="button" class="badge badge-success">Not Upload</button>
									@endif
								  </td>
									  <td>
									@if($userval->status==1)
										<label class="badge badge-success">Active</label>
									@else($userval->status == '0')
										<label class="badge badge-danger">In-Active</label>
									@endif
								  </td>
								 <td>
									<a class="badge badge-info linkdec" href="{{ url('/admin/view-user/'.$userval->id) }}">Edit</a>
								 </td>
								  <td>
									<a class="badge badge-danger" href="{{ url('/admin/delete-user/'.$userval->id) }}">Delete</a>
								  </td>
							  </tr>
								<div class="modal fade" id="myModal{{$userval->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
								  <div class="modal-dialog">
									<div class="modal-content">
									  <div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">Kyc verification</h5>
										<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
									  </div>
									  <form action="{{ url('/admin/updatekycstatus') }}" method="post">@csrf
									      <input type="hidden" name="hid" value="{{ $userval->id }}">
										  <div class="modal-body">
											<div class="row">
												<div class="form-group col-md-4">
												  <label class="">Document Type :</label>
												</div>
												<div class="form-group col-md-4">
												  <label class="">{{ $card_type }}</label>
												</div>
											</div>
											<div class="row">
												<div class="form-group col-md-12">
												  <label class="">{{ $card_type }} Front :</label>
													<a href="{{ asset('storage/card/'.$userval->card_front) }}" data-toggle="lightbox" data-gallery="example-gallery" class="col-sm-4">
														<img src="{{ asset('storage/card/'.$userval->card_front) }}" class="img-fluid">
													</a>
												</div>
											</div>
											<div class="row">
												<div class="form-group col-md-4">
												  <label class="">{{ $card_type }} Back :</label>
													<a href="{{ asset('storage/card/'.$userval->card_back) }}" data-toggle="lightbox" data-gallery="example-gallery" class="col-sm-4">
														<img src="{{ asset('storage/card/'.$userval->card_back) }}" class="img-fluid">
													</a>
												</div>
											</div>
											<div class="row">
												<div class="form-group col-md-4">
												  <label class="">Selfie Image :</label>
													<a href="{{ asset('storage/card/'.$userval->card_selfie) }}" data-toggle="lightbox" data-gallery="example-gallery" class="col-sm-4">
														<img src="{{ asset('storage/card/'.$userval->card_selfie) }}" class="img-fluid">
													</a>
												</div>
											</div>
											<div class="row">
												<div class="form-group col-md-6">
												  <label class="">Status :</label>
												</div>
												<div class="form-group col-md-6">
												  <select name="is_verified" id="is_verified" class="form-control form-control-lg" required="">
													 <option value="">Select Gender</option>
													 <option value="0" @if(isset($userval))@if($userval->is_verified==0) {{ "selected" }} @endif @endif>Not Verified </option>
													 <option value="1" @if(isset($userval))@if($userval->is_verified==1) {{ "selected" }} @endif @endif>Verified</option>
												  </select>
												</div>
											</div>
										  </div>
										  <div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
											<button type="submit" class="btn btn-primary">Update</button>
										  </div>
									  </form>
									</div>
								  </div>
								</div>
							@endforeach
						@endif
                        </tbody>
                      </table>
                    </div>
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
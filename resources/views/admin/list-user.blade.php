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
									<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal{{$userval->id}}">Verify</button>
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
								<div class="modal fade" id="myModal1" role="dialog">
								   <div class="modal-dialog modal-xl">
									  <div class="modal-content">
										 <div class="modal-header" style=" height:50px;">
											Deposit Information!
											<button type="button" class="close" style="height:35px; width:35px; float:right;" data-dismiss="modal">&times;</button>
										 </div>
										 <form action="{{ url('/user/updatekyc') }}" method="post">@csrf
											<input type="hidden" name="hid" value="{{ $userval->id }}">
											 <div class="modal-body">
											 </div>
											<div class="modal-footer">
												<button type="submit" class="btn btn-success" name="submit">Update</button>
												<button type="button" class="btn btn-danger deposit_button" data-dismiss="modal">Close!</button>
											</div>
										</form>
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
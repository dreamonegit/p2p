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
                            <th>Email Address</th>
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
									{{ $userval->email  }}
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
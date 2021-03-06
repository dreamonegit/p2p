        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
			  @if(auth::user()->profile_image!='')
					<div class="nav-profile-image">
					  <img src="{{ asset('storage/profile/'.auth::user()->profile_image) }}" alt="profile">
					  <span class="login-status online"></span>
					  <!--change to offline or busy as needed-->
					</div>
				@endif
                <div class="nav-profile-text d-flex flex-column">
                  <span class="font-weight-bold mb-2">{{ auth::user()->name }}</span>
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('admin/home') }}">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon mdi-24px float-right"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('admin/listcoin') }}">
                <span class="menu-title">Coin Details</span>
                <i class="mdi mdi-bitcoin menu-icon mdi-24px float-right"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('admin/list-user') }}">
                <span class="menu-title">User Details</span>
                <i class="mdi mdi-account-details menu-icon mdi-24px float-right"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('admin/list-deposit') }}">
                <span class="menu-title">Deposit Details</span>
                <i class="mdi mdi-bank menu-icon mdi-24px float-right"></i>
              </a>
            </li>
          </ul>
        </nav>
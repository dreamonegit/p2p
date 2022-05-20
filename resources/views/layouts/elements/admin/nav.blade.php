
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <a class="navbar-brand brand-logo" href="#"><img src="{{ asset('assets/images/logo.png') }}" alt="logo" /></a>
          <a class="navbar-brand brand-logo-mini" href="#"><img src="{{ asset('assets/images/logo-mini.png') }}" alt="logo" /></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>

          <ul class="navbar-nav navbar-nav-right">
			<li class="nav-item dropdown">
              <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="true">
                <i class="mdi mdi-bell-outline"></i>
                <span class="notification"></span>
              </a>
            </li>
            <li class="nav-item nav-profile dropdown">
              <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                @if(auth::user()->profile_image!='')
					<div class="nav-profile-img">
					  <img src="{{ asset('storage/profile/'.auth::user()->profile_image) }}" alt="image">
					  <span class="availability-status online"></span>
					</div>
				@endif
                <div class="nav-profile-text">
                  <p class="mb-1 text-black">{{ auth::user()->name }}</p>
                </div>
              </a>
              <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                
                <div class="dropdown-divider"></div>
				        <a class="dropdown-item" href="{{ url('/admin/myprofile')}}">
                  <i class="mdi mdi-account-check-outline me-2 text-primary"></i> My Profile </a>
                <a class="dropdown-item" href="{{ url('/admin/logout') }}">
                 <i class="mdi mdi-logout me-2 text-primary"></i> Signout </a>
              </div>
            </li>      
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>
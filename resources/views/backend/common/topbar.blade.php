<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
<nav class="navbar navbar-expand navbar-light navbar-bg">
	<a class="sidebar-toggle js-sidebar-toggle">
	<i class="hamburger align-self-center"></i>
	</a>
	<div class="navbar-collapse collapse">
		<ul class="navbar-nav navbar-align">
			{{-- <li class="nav-item dropdown">
				<a class="nav-icon dropdown-toggle" href="#" id="alertsDropdown" data-bs-toggle="dropdown">
					<div class="position-relative">
						<i class="align-middle" data-feather="bell"></i>
						<span class="indicator">2</span>
					</div>
				</a>
				<div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0" aria-labelledby="alertsDropdown">
					<div class="dropdown-menu-header">
						2 New Notifications
					</div>
					<div class="list-group">
						<a href="#" class="list-group-item">
							<div class="row g-0 align-items-center">
								<div class="col-2">
									<i class="text-danger" data-feather="alert-circle"></i>
								</div>
								<div class="col-10">
									<div class="text-dark">Update completed</div>
									<div class="text-muted small mt-1">Restart server 12 to complete the update.</div>
									<div class="text-muted small mt-1">30m ago</div>
								</div>
							</div>
						</a>
						<a href="#" class="list-group-item">
							<div class="row g-0 align-items-center">
								<div class="col-2">
									<i class="text-warning" data-feather="bell"></i>
								</div>
								<div class="col-10">
									<div class="text-dark">Lorem ipsum</div>
									<div class="text-muted small mt-1">Aliquam ex eros, imperdiet vulputate hendrerit et.</div>
									<div class="text-muted small mt-1">2h ago</div>
								</div>
							</div>
						</a>
					</div>
					<div class="dropdown-menu-footer">
						<a href="#" class="text-muted">Show all notifications</a>
					</div>
				</div>
			</li> --}}
			<li class="nav-item dropdown">
				@if (empty(session()->get('loggedUser')->time_in))
				<a class="animate__animated animate__slow animate__flash animate__infinite nav-icon btn btn-danger text-white" href="{{url('time-in')}}">Time in</a>
				@elseif (empty(session()->get('loggedUser')->time_out))
				<a class="animate__animated animate__slow animate__flash animate__infinite nav-icon btn btn-danger text-white" href="{{url('time-out')}}">Time out</a>
				@endif
				
			</li>

			<li class="nav-item dropdown">
				<a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
				<i class="align-middle" data-feather="settings"></i>
				</a>
				<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
				<img src="{{ (!empty(session()->get('loggedUser')->profile_picture)) ? env('APP_URL').'uploads/'.session()->get('loggedUser')->profile_picture : asset('public/assets/img/avatars/avatar.jpg') }}" class="avatar img-fluid rounded me-1" alt="John Doe" /> <span class="text-dark">{{session()->get('loggedUser')->name}}</span>
				</a>
				
				<div class="dropdown-menu dropdown-menu-end">
					<a class="dropdown-item" href="{{url('update-profile')}}"><i class="align-middle me-1" data-feather="user"></i> Profile</a>
					
					<a class="dropdown-item" href="{{url('change-password')}}"><i class="align-middle me-1" data-feather="help-circle"></i> Change Password</a>

					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="{{url('/logout')}}">Log out</a>
				</div>
			</li>
		</ul>
	</div>
</nav>


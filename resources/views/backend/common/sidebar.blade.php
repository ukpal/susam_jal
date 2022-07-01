<style>
	.sidebar [aria-expanded=true]:after, .sidebar [data-bs-toggle=collapse]:not(.collapsed):after {
		top: 1.4rem;
		transform: rotate(-135deg);
	}
	.sidebar [aria-expanded=true]:after, .sidebar [data-bs-toggle=collapse]:not(.collapsed):after {
		top: 1.4rem;
		transform: rotate(-135deg);
	}
	.sidebar [data-bs-toggle=collapse]:after {
		border: solid;
		border-width: 0 0.075rem 0.075rem 0;
		content: " ";
		display: inline-block;
		padding: 2px;
		position: absolute;
		right: 1.5rem;
		top: 1.2rem;
		transform: rotate(45deg);
		transition: all .2s ease-out;
	}
</style>

<nav id="sidebar" class="sidebar js-sidebar">
	<div class="sidebar-content js-simplebar">
		<a class="sidebar-brand" href="/dashboard">
		    <span class="align-middle">ASJ</span>
		</a>
		<ul class="sidebar-nav">
			{{-- <li class="sidebar-header">
				Pages
			</li> --}}
			<li class="sidebar-item {{ activeMenu(['dashboard'])}}">
				<a class="sidebar-link" href="{{url('dashboard')}}">
				<i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
				</a>
			</li>
			<li class="sidebar-item {{ activeMenu(['employees','users'])}}">
				<a data-bs-target="#emps" data-bs-toggle="collapse" class="sidebar-link collapsed" aria-expanded="false">
					<i class="align-middle" data-feather="sliders"></i>
					 <span class="align-middle">Manage Employees</span>
				</a>
				<ul id="emps" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar" style="">
					@if(in_array(session()->get('loggedUser')->role, ['admin','super admin']))
					<li class="sidebar-item {{ activeMenu(['edit-employee/*','employees'])}}">
						<a class="sidebar-link" href="{{url('employees')}}">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevrons-right align-middle me-2"><polyline points="13 17 18 12 13 7"></polyline><polyline points="6 17 11 12 6 7"></polyline></svg>
							Employees</a></li>
					@endif
					@if(in_array(session()->get('loggedUser')->role, ['admin','super admin']))
					<li class="sidebar-item {{ activeMenu(['edit-user/*','users'])}}">
						<a class="sidebar-link" href="{{url('users')}}">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevrons-right align-middle me-2"><polyline points="13 17 18 12 13 7"></polyline><polyline points="6 17 11 12 6 7"></polyline></svg>
							Users</a></li>
					@endif			
				</ul>
			</li>
			
			
			
			@if(in_array(session()->get('loggedUser')->role, ['admin','super admin']))
			<li class="sidebar-item {{ activeMenu(['offdays'])}}">
				<a class="sidebar-link " href="{{url('offdays')}}">
				<i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Offdays</span>
				</a>
			</li>
			@endif
			<li class="sidebar-item {{ activeMenu(['calender/*'])}}">
				<a class="sidebar-link" href="{{url('calender').'/'.date("n").'/'.date("Y")}}">
				<i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Calender</span>
				</a>
			</li>
			@if(!in_array(session()->get('loggedUser')->role, ['admin']))
			<li class="sidebar-item {{ activeMenu(['leave-applications','new-leave-application'])}}">
				<a class="sidebar-link" href="{{url('leave-applications')}}">
				<i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Leaves Applied</span>
				</a>
			</li>
			@endif
			@if(in_array(session()->get('loggedUser')->role, ['admin']))
			<li class="sidebar-item {{ activeMenu(['all-leave-applications'])}}">
				<a class="sidebar-link" href="{{url('all-leave-applications')}}">
				<i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Leave Applications</span>
				</a>
			</li>
			@endif
			<li class="sidebar-item {{ activeMenu(['surveyors','my-survey','survey-types','all-survey'])}}">
				<a data-bs-target="#pages" data-bs-toggle="collapse" class="sidebar-link collapsed" aria-expanded="false">
					<i class="align-middle" data-feather="sliders"></i>
					 <span class="align-middle">Manage Survey</span>
				</a>
				<ul id="pages" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar" style="">
					@if(in_array(session()->get('loggedUser')->role, ['admin','super admin']))
					<li class="sidebar-item {{ activeMenu(['surveyors'])}}"><a class="sidebar-link" href="{{url('surveyors')}}">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevrons-right align-middle me-2"><polyline points="13 17 18 12 13 7"></polyline><polyline points="6 17 11 12 6 7"></polyline></svg>
						Surveyors</a></li>
					@endif	
					@if(in_array(session()->get('loggedUser')->role, ['admin','super admin']))
					<li class="sidebar-item {{ activeMenu(['survey-types'])}}">
						<a class="sidebar-link" href="{{url('survey-types')}}">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevrons-right align-middle me-2"><polyline points="13 17 18 12 13 7"></polyline><polyline points="6 17 11 12 6 7"></polyline></svg>Survey Types
						</a>
					</li>
					@endif
					@if(in_array(session()->get('loggedUser')->role, ['surveyor']))
					<li class="sidebar-item {{ activeMenu(['my-survey'])}}">
						<a class="sidebar-link" href="{{url('my-survey')}}">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevrons-right align-middle me-2"><polyline points="13 17 18 12 13 7"></polyline><polyline points="6 17 11 12 6 7"></polyline></svg>My Survey
						</a>
					</li>
					@endif		
					@if(in_array(session()->get('loggedUser')->role, ['admin','supervisor','super admin']))			
					<li class="sidebar-item {{ activeMenu(['edit-assign-survey/*','all-survey','all-responses/*','edit-response/*'])}}">
						<a class="sidebar-link" href="{{url('all-survey')}}">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevrons-right align-middle me-2"><polyline points="13 17 18 12 13 7"></polyline><polyline points="6 17 11 12 6 7"></polyline></svg>Surveys
						</a>
					</li>
					@endif		
				</ul>
			</li>
			<li class="sidebar-item {{ activeMenu(['district','sub-division','block','gram-panchayat','survey-areas'])}}">
				<a data-bs-target="#areas" data-bs-toggle="collapse" class="sidebar-link collapsed" aria-expanded="false">
					<i class="align-middle" data-feather="sliders"></i>
					 <span class="align-middle">Manage Areas</span>
				</a>
				<ul id="areas" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar" style="">
					<li class="sidebar-item {{ activeMenu(['district'])}}"><a class="sidebar-link" href="{{url('district')}}">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevrons-right align-middle me-2"><polyline points="13 17 18 12 13 7"></polyline><polyline points="6 17 11 12 6 7"></polyline></svg>
						Districts</a></li>
					<li class="sidebar-item {{ activeMenu(['sub-division'])}}"><a class="sidebar-link" href="{{url('sub-division')}}">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevrons-right align-middle me-2"><polyline points="13 17 18 12 13 7"></polyline><polyline points="6 17 11 12 6 7"></polyline></svg>
						Sub Divisions</a></li>
					<li class="sidebar-item {{ activeMenu(['block'])}}"><a class="sidebar-link" href="{{url('block')}}">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevrons-right align-middle me-2"><polyline points="13 17 18 12 13 7"></polyline><polyline points="6 17 11 12 6 7"></polyline></svg>
						Blocks</a></li>
					<li class="sidebar-item {{ activeMenu(['gram-panchayat'])}}"><a class="sidebar-link" href="{{url('gram-panchayat')}}">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevrons-right align-middle me-2"><polyline points="13 17 18 12 13 7"></polyline><polyline points="6 17 11 12 6 7"></polyline></svg>
						Gram Panchayats</a></li>
					<li class="sidebar-item {{ activeMenu(['survey-areas'])}}"><a class="sidebar-link" href="{{url('survey-areas')}}">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevrons-right align-middle me-2"><polyline points="13 17 18 12 13 7"></polyline><polyline points="6 17 11 12 6 7"></polyline></svg>
						Municipality Areas</a></li>
				</ul>
			</li>
			<li class="sidebar-item">
				<a class="sidebar-link" href="{{url('activity-wrapup')}}">
				<i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Activity Wrapup</span>
				</a>
			</li>

			<li class="sidebar-item">
				<a class="sidebar-link" href="{{url('change-password')}}">
				<i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Change Password</span>
				</a>
			</li>
			
		</ul>
		
	</div>
</nav>
<!doctype html>
<html lang="en">
	<head>
		@include('backend.common.header')
	</head>
	<body>
		<div class="wrapper">

			@include('backend.common.sidebar')

			<div class="main">

				@include('backend.common.topbar')

				<main class="content">
					<div class="container-fluid p-0">
						<!-- Page Content -->
						@yield('content')
						<!-- /#page-content -->
					</div>
				</main>	
				
				<footer class="footer">
					<div class="container-fluid">
						<div class="row text-muted">
							<div class="col-6 text-start">
								<p class="mb-0">
									<a class="text-muted" href="#" target="_blank"><strong>Aamra Susama Jalaprapat</strong></a> &copy; {{ date('Y') }}
								</p>
							</div>
							<div class="col-6 text-end">
								<ul class="list-inline">
									<li class="list-inline-item">
										<a class="text-muted" href="#" target="_blank">Developed by Aranax Technologies Pvt Ltd</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</footer>

			</div>	

			{!!flash_message()!!}

		</div>
		@include('backend.common.footer')
	</body>

</html>


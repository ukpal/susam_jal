<!doctype html>
<html lang="en">
	<head>
		@include('backend.common.header')
	</head>
	<body>
		<!-- Page Content -->
		@yield('content')
		<!-- /#page-content -->

		{!!flash_message()!!}

		@include('backend.common.footer')
	</body>

</html>


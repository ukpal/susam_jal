<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="description" content="">
<meta name="keyword" content="">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="author" content="Aranax Technologies Pvt Ltd">

<title>@yield('page_title') | {{app_name()}}</title>

<link rel="preconnect" href="https://fonts.gstatic.com">

<link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
<link href="{{ asset('public/assets/css/app.css') }}" rel="stylesheet">
@yield('style')
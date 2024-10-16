
<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>Deskapp</title>
	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/pages/images/apple-touch-icon.png') }}">
	<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/pages/images/favicon-32x32.png') }}">
	<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/pages/images/favicon-16x16.png') }}">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="theme-color" content="#1b00ff">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/pages/css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/pages/css/base.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/pages/css/style.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/pages/css/media.css') }}">
</head>
<body class="d-flex align-items-center justify-content-center coming-soon-page">
	<div class="container">
		<div class="title text-center pb-20">
			<h1 class="font-weight-300 text-white max-w-700 mx-auto">BIENVENUE SUR DESKAPP GESTION</h1>
		</div>
		<div class="title text-center">
			<h2 class="text-danger"><a href="{{ route('admin.login') }}" class="text-danger">Go</a></h2>
		</div>
	</div>
	<!-- JS File -->
	<script src="{{ asset('assets/pages/js/jquery.min.js') }}"></script>
	<script src="{{ asset('assets/pages/js/popper.min.js') }}"></script>
	<script src="{{ asset('assets/pages/js/bootstrap.min.js') }}"></script>
</body>
</html>

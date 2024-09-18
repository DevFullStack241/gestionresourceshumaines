
<!DOCTYPE html>
<html>
	<head>
		<!-- Basic Page Info -->
		<meta charset="utf-8" />
		<title>DeskApp - Bootstrap Admin Dashboard HTML Template</title>

		<!-- Site favicon -->
		<link
			rel="apple-touch-icon"
			sizes="180x180"
			href="{{ asset('assets/vendors/images/') }}"
		/>
		<link
			rel="icon"
			type="image/png"
			sizes="32x32"
			href="{{ asset('assets/vendors/images/') }}"
		/>
		<link
			rel="icon"
			type="image/png"
			sizes="16x16"
			href="{{ asset('assets/vendors/images/') }}"
		/>

		<!-- Mobile Specific Metas -->
		<meta
			name="viewport"
			content="width=device-width, initial-scale=1, maximum-scale=1"
		/>

		<!-- Google Font -->
		<link
			href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
			rel="stylesheet"
		/>
		<!-- CSS -->
		<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/styles/admin.css') }}" />
		<link
			rel="stylesheet"
			type="text/css"
			href="{{ asset('assets/vendors/styles/') }}"
		/>
		<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/styles/admin1.css') }}" />
        @stack('stylesheet')
	</head>
	<body class="login-page">
		<div class="login-header box-shadow">
			<div
				class="container-fluid d-flex justify-content-between align-items-center"
			>
				<div class="brand-logo">
					<a href="login.html">
						<img src="{{ asset('assets/vendors/images/deskapp-logo.svg') }}" alt="" />
					</a>
				</div>
			</div>
		</div>
		<div
			class="login-wrap d-flex align-items-center flex-wrap justify-content-center"
		>
			<div class="container">
				@yield('content')
			</div>
		</div>
		<!-- js -->
		<script src="{{ asset('assets/vendors/scripts/core.js') }}"></script>
		<script src="{{ asset('assets/vendors/scripts/script.min.js') }}"></script>
		<script src="{{ asset('assets/vendors/scripts/process.js') }}"></script>
		<script src="{{ asset('assets/vendors/scripts/layout-settings.js') }}"></script>
        <script>
            if( navigator.userAgent.indexOf("Firefox") != -1 ){
            history.pushState(null, null, document.URL);
            window.addEventListener('popstate', function(){
                history.pushState(null, null, document.URL);
            });
        }
        </script>


		@stack('scripts')
	</body>
</html>

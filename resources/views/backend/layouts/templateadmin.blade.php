<!DOCTYPE html>
<html>
<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8" />
    <title>DeskApp</title>

    <!-- Site favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/vendors/images/apple-touch-icon.png') }}" />
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/vendors/images/favicon-32x32.png') }}" />
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/vendors/images/favicon-16x16.png') }}" />

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet" />
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/styles/admin.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/styles/icon-font.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/styles/admin1.css') }}" />
    <link rel="stylesheet" href="{{ asset('personnification.css') }}" />


    <link
			rel="stylesheet"
			type="text/css"
			href="{{ asset('assets/src/plugins/fullcalendar/fullcalendar.css') }}"
		/>

    <link rel="stylesheet" href="{{ asset('extra-assets/ijabo/ijabo.min.css') }}">
    <link rel="stylesheet" href="{{ asset('extra-assets/ijaboCropTool/ijaboCropTool.min.css') }}">

    <!-- Global site tag (gtag.js) - Google Analytics -->
		<script
        async
        src="https://www.googletagmanager.com/gtag/js?id=G-GBZ3SGGX85"
    ></script>
    <script
        async
        src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2973766580778258"
        crossorigin="anonymous"
    ></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() {
            dataLayer.push(arguments);
        }
        gtag("js", new Date());

        gtag("config", "G-GBZ3SGGX85");
    </script>
    <!-- Google Tag Manager -->
    <script>
        (function (w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({ "gtm.start": new Date().getTime(), event: "gtm.js" });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != "dataLayer" ? "&l=" + l : "";
            j.async = true;
            j.src = "https://www.googletagmanager.com/gtm.js?id=" + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, "script", "dataLayer", "GTM-NXZMQSS");
    </script>
    <!-- End Google Tag Manager -->

    @livewireStyles
    @stack('stylesheet')


</head>

<body>

    @include('backend.layouts.headeradmin')

    @include('backend.layouts.rightsidebaradmin')

    @include('backend.layouts.leftsidebaradmin')

    <div class="mobile-menu-overlay"></div>

    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                @yield('content')
            </div>
        </div>
    </div>


    <!-- js -->
    <script src="{{ asset('assets/vendors/scripts/core.js') }}"></script>
    <script src="{{ asset('assets/vendors/scripts/script.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/scripts/process.js') }}"></script>
    <script src="{{ asset('assets/vendors/scripts/layout-settings.js') }}"></script>
    <script src="{{ asset('assets/src/plugins/fullcalendar/fullcalendar.min.js') }}"></script>
	<script src="{{ asset('assets/vendors/scripts/calendar-setting.js') }}"></script>
    <script>
        if( navigator.userAgent.indexOf("Firefox") != -1 ){
            history.pushState(null, null, document.URL);
            window.addEventListener('popstate', function(){
                history.pushState(null, null, document.URL);
            });
        }
    </script>
    <script src="{{ asset('extra-assets/ijabo/ijabo.min.js') }}"></script>
    <script src="{{ asset('extra-assets/ijabo/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('extra-assets/ijaboCropTool/ijaboCropTool.min.js') }}"></script>
    <script>
        window.addEventListener('showToastr', function(event){
                    toastr.remove();
                    if( event.detail[0].type === 'info' ){ toastr.info(event.detail[0].message); }
                    else if( event.detail[0].type === 'success' ){ toastr.success(event.detail[0].message); }
                    else if( event.detail[0].type === 'error' ){ toastr.error(event.detail[0].message); }
                    else if( event.detail[0].type === 'warning' ){ toastr.warning(event.detail[0].message); }
                    else{ return false; }
                });
    </script>
    @livewireScripts
    @stack('scripts')
</body>

</html>















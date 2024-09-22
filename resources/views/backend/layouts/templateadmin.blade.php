<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8" />
    <title>DeskApp - Bootstrap Admin Dashboard HTML Template</title>

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

    <link rel="stylesheet" href="{{ asset('extra-assets/ijabo/ijabo.min.css') }}">
    <link rel="stylesheet" href="{{ asset('extra-assets/ijaboCropTool/ijaboCropTool.min.css') }}">

    @livewireStyles
    @stack('stylesheet')


</head>

<body>
    {{-- <div class="pre-loader">
        <div class="pre-loader-box">
            <div class="loader-logo">
                <img src="assets/vendors/images/deskapp-logo.svg" alt="" />
            </div>
            <div class="loader-progress" id="progress_div">
                <div class="bar" id="bar1"></div>
            </div>
            <div class="percent" id="percent1">0%</div>
            <div class="loading-text">Loading...</div>
        </div>
    </div> --}}

    @include('backend.layouts.headeradmin')

    @include('backend.layouts.rightsidebaradmin')

    @include('backend.layouts.leftsidebaradmin')

    <div class="mobile-menu-overlay"></div>

    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                {{-- <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>blank</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="index.html">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        blank
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div> --}}
                <div class="">
                    @yield('content')
                </div>
            </div>
            @include('backend.layouts.footer')
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

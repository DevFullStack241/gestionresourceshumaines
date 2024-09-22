<div class="left-side-bar">
    <div class="brand-logo">
        <a href="index.html">
            <img src="{{ asset('assets/vendors/images/deskapp-logo.svg') }}" alt="" class="dark-logo" />
            <img
                src="{{ asset('assets/vendors/images/deskapp-logo-white.svg') }}"
                alt=""
                class="light-logo"
            />
        </a>
        <div class="close-sidebar" data-toggle="left-sidebar-close">
            <i class="ion-close-round"></i>
        </div>
    </div>
    <div class="menu-block customscroll">
        <div class="sidebar-menu">
            <ul id="accordion-menu">

                @if ( Route::is('admin.*') )


                <li class="dropdown">
                    <a href="{{ route('admin.dashboard') }}" class="dropdown-toggle no-arrow {{ Route::is('admin.dashboard') ? 'active' : '' }}">
                        <span class="micon bi bi-house"></span
                        ><span class="mtext">Dashboard</span>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon bi bi-textarea-resize"></span
                        ><span class="mtext">Forms</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="form-basic.html">Form Basic</a></li>
                        <li>
                            <a href="advanced-components.html">Advanced Components</a>
                        </li>
                        <li><a href="form-wizard.html">Form Wizard</a></li>
                        <li><a href="html5-editor.html">HTML5 Editor</a></li>
                        <li><a href="form-pickers.html">Form Pickers</a></li>
                        <li><a href="image-cropper.html">Image Cropper</a></li>
                        <li><a href="image-dropzone.html">Image Dropzone</a></li>

                        @endif



                    </ul>
                </li>
                <li>
                    <a href="calendar.html" class="dropdown-toggle no-arrow">
                        <span class="micon bi bi-calendar4-week"></span
                        ><span class="mtext">Calendar</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>

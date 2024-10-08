<div>


    @if ( Auth::guard('admin')->check() )
    <div class="user-info-dropdown">
        <div class="dropdown">
            <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                <span class="user-icon">
                    <img src="{{ $admin->picture }}" alt="" />
                </span>
                <span class="user-name">{{ $admin->name }}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                <a class="dropdown-item" href="{{ route('admin.profile') }}"><i class="dw dw-user1"></i> Profile</a>
                {{-- <a class="dropdown-item" href="profile.html"><i class="dw dw-settings2"></i> Setting</a>
                <a class="dropdown-item" href="faq.html"><i class="dw dw-help"></i> Help</a> --}}
                <a class="dropdown-item" href="{{ route('admin.logout_handler') }}" onclick="event.preventDefault();document.getElementById('adminLogoutForm').
                        submit();"><i class="dw dw-logout"></i> Déconnexion </a>
                <form action="{{ route('admin.logout_handler') }}" method="POST" id="adminLogoutForm">
                    @csrf
                </form>
            </div>
        </div>
    </div>
    @elseif( Auth::guard('responsable')->check() )
    <div class="user-info-dropdown">
        <div class="dropdown">
            <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                <span class="user-icon">
                    <img src="{{ $responsable->picture }}" alt="" />
                </span>
                <span class="user-name">{{ $responsable->name }}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                <a class="dropdown-item" href="{{ route('responsable.profile') }}" ><i class="dw dw-user1"></i> Profile</a>
                {{-- <a class="dropdown-item" href="profile.html"><i class="dw dw-settings2"></i> Setting</a>
                <a class="dropdown-item" href="faq.html"><i class="dw dw-help"></i> Help</a> --}}
                <a class="dropdown-item" href="{{ route('responsable.logout') }}"
                    onclick="event.preventDefault();document.getElementById('responsableLogoutForm').submit();"><i
                        class="dw dw-logout"></i>Déconnexion</a>
                <form action="{{ route('responsable.logout') }}" id="responsableLogoutForm" method="POST">@csrf</form>
            </div>
        </div>
    </div>
    @endif


</div>

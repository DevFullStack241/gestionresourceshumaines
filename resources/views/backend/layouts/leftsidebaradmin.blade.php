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
                        <span class="micon fa fa-home"></span
                        ><span class="mtext">Dashboard</span>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon fa fa-group"></span
                        ><span class="mtext">Responsables</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ route('admin.responsable.index') }}">Liste des responsables</a></li>
                        <li>
                            <a href="{{ route('admin.responsable.create') }}">Ajouter un responsable</a>
                        </li>
                        @endif
                    </ul>
                </li>
                <li>
                    <a href="" class="dropdown-toggle no-arrow">
                        <span class="micon bi bi-calendar4-week"></span
                        ><span class="mtext">Calendar</span>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon bi bi-textarea-resize"></span
                        ><span class="mtext">Agents</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="form-basic.html">Liste des agents</a></li>
                        <li>
                            <a href="advanced-components.html">Ajouter un agent</a>
                        </li>

                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-apartment"></span
                        ><span class="mtext">Clients</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ route('admin.client.index') }}">Liste des clients</a></li>
                        <li>
                            <a href="{{ route('admin.client.create') }}">Ajouter un client</a>
                        </li>

                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon bi bi-textarea-resize"></span
                        ><span class="mtext">Missions</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ route('admin.mission.index') }}">Liste des missions</a></li>
                        <li>
                            <a href="{{ route('admin.mission.create') }}">Ajouter une mission</a>
                        </li>

                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon bi bi-textarea-resize"></span
                        ><span class="mtext">Postes</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ route('admin.poste.index') }}">Liste des postes</a></li>
                        <li>
                            <a href="{{ route('admin.poste.create') }}">Ajouter un poste</a>
                        </li>

                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon bi bi-textarea-resize"></span
                        ><span class="mtext">Affectations</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ route('admin.affectation.index') }}">Liste des affectations</a></li>
                        <li>
                            <a href="{{ route('admin.affectation.create') }}">Ajouter une affectation</a>
                        </li>

                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon bi bi-textarea-resize"></span
                        ><span class="mtext">Quart de travail</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ route('admin.quarttravail.index') }}">Liste des quarts de travail</a></li>
                        <li>
                            <a href="{{ route('admin.quarttravail.create') }}">Ajouter un quart de travail</a>
                        </li>

                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon bi bi-textarea-resize"></span
                        ><span class="mtext">Disponibilitées</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ route('admin.disponibilite.index') }}">Liste des disponibilitées</a></li>
                        <li>
                            <a href="{{ route('admin.disponibilite.create') }}">Ajouter une disponibilitée</a>
                        </li>

                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>

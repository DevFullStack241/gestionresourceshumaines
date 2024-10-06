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
                <li class="dropdown">
                    <a href="{{ route('responsable.home') }}" class="dropdown-toggle no-arrow" {{ Route::is('responsable.home') ? 'active' : '' }}>
                        <span class="micon bi bi-house"></span
                        ><span class="mtext">Dashboard</span>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon bi bi-textarea-resize"></span
                        ><span class="mtext">Responsables</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="form-basic.html">Liste des responsables</a></li>
                        <li>
                            <a href="advanced-components.html">Ajouter un responsable</a>
                        </li>

                    </ul>
                </li>
                <li>
                    <a href="{{ route('responsable.home') }}" class="dropdown-toggle no-arrow">
                        <span class="micon bi bi-calendar4-week"></span
                        ><span class="mtext">Calendrier</span>
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
                        <span class="micon bi bi-textarea-resize"></span
                        ><span class="mtext">Clients</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="form-basic.html">Liste des clients</a></li>
                        <li>
                            <a href="advanced-components.html">Ajouter un client</a>
                        </li>

                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon bi bi-textarea-resize"></span
                        ><span class="mtext">Missions</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="form-basic.html">Liste des missions</a></li>
                        <li>
                            <a href="advanced-components.html">Ajouter une mission</a>
                        </li>

                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon bi bi-textarea-resize"></span
                        ><span class="mtext">Postes</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="form-basic.html">Liste des postes</a></li>
                        <li>
                            <a href="advanced-components.html">Ajouter un poste</a>
                        </li>

                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon bi bi-textarea-resize"></span
                        ><span class="mtext">Affectations</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="form-basic.html">Liste des affectations</a></li>
                        <li>
                            <a href="advanced-components.html">Ajouter une affectation</a>
                        </li>

                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon bi bi-textarea-resize"></span
                        ><span class="mtext">Quart de travail</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="form-basic.html">Liste des quarts de travail</a></li>
                        <li>
                            <a href="advanced-components.html">Ajouter un quart de travail</a>
                        </li>

                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon bi bi-textarea-resize"></span
                        ><span class="mtext">Disponibilitées</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="form-basic.html">Liste des disponibilitées</a></li>
                        <li>
                            <a href="advanced-components.html">Ajouter une disponibilitée</a>
                        </li>

                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>

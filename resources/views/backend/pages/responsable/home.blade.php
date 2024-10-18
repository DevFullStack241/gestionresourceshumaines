@extends('backend.layouts.template')
@section('content')
<div class="xs-pd-20-10 pd-ltr-20">
    <div class="title pb-20">
        <h2 class="h3 mb-0">Présentation du tableau de bord DeskApp</h2>
    </div>
    <div class="row pb-10">
        <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
            <div class="card-box height-100-p widget-style3">
                <div class="d-flex flex-wrap">
                    <div class="widget-data">
                        <div class="weight-700 font-24 text-dark">{{ $agents }}</div>
                        <div class="font-14 text-secondary weight-500">
                            Total Agents
                        </div>
                    </div>
                    <div class="widget-icon">

                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
            <div class="card-box height-100-p widget-style3">
                <div class="d-flex flex-wrap">
                    <div class="widget-data">
                        <div class="weight-700 font-24 text-dark">{{ $responsables }}</div>
                        <div class="font-14 text-secondary weight-500">
                            Total Responsables
                        </div>
                    </div>
                    <div class="widget-icon">

                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
            <div class="card-box height-100-p widget-style3">
                <div class="d-flex flex-wrap">
                    <div class="widget-data">
                        <div class="weight-700 font-24 text-dark">{{ $clients }}</div>
                        <div class="font-14 text-secondary weight-500">
                            Total Clients
                        </div>
                    </div>
                    <div class="widget-icon">

                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
            <div class="card-box height-100-p widget-style3">
                <div class="d-flex flex-wrap">
                    <div class="widget-data">
                        <div class="weight-700 font-24 text-dark">{{ $postes }}</div>
                        <div class="font-14 text-secondary weight-500">Total Postes</div>
                    </div>
                    <div class="widget-icon">

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row pb-10">
        @foreach ($missions as $missions)
        <div class="col-xl-3 col-lg-3 col-md-6 mb-20 missions-grid">
            <div class="mission-card">
                <div class="indice">
                    <div class="icon"><i class="fa fa-briefcase"></i></div>
                    <div class="title">{{ $missions->title }}</div>
                    <div class="actions">
                        {{-- Actions (comme les icônes pour les discussions ou options supplémentaires) --}}
                    </div>
                </div>
                <div class="times">
                    <div class="start-time">
                        <i class="fa fa-clock"></i>
                        <div>
                            <p>Heure de début</p>
                            <h3>{{ \Carbon\Carbon::parse($missions->start_date)->format('H:i') }}</h3>
                        </div>
                    </div>
                    <div class="end-time">
                        <i class="fa fa-clock"></i>
                        <div>
                            <p>Heure de fin</p>
                            <h3>{{ \Carbon\Carbon::parse($missions->end_date)->format('H:i') }}</h3>
                        </div>
                    </div>
                </div>
                <div class="footer">
                    <div class="resources">
                        <i class="fa fa-users"></i>
                        <span>{{ $missions->affectations_count }}</span> <!-- Le nombre d'agents assignés -->
                    </div>
                    <div class="date">
                        <span>{{ \Carbon\Carbon::parse($missions->updated_at)->translatedFormat('D. d/m/Y') }}</span>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>



</div>
@endsection

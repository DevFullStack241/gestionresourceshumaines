@extends('backend.layouts.templateadmin')

@section('content')
<div class="page-header">
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="title">
                <h4>Détails de la Disponibilité</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Détails de la Disponibilité
                    </li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="pd-20 card-box mb-30">
    <div class="clearfix">
        <div class="pull-left">
            <h4 class="text-black h4">Informations</h4>
        </div>
        <div class="pull-right">
            <a href="{{ route('admin.disponibilite.index') }}" class="btn btn-primary" role="button">
                <i class="micon ion-chevron-left"></i> Retour
            </a>
        </div>
    </div>
    <br><br>

    <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label">Agent:</label>
        <div class="col-sm-12 col-md-10">
            <p class="form-control-static">{{ $disponibilites->agent->name }}</p>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label">Heure de début:</label>
        <div class="col-sm-12 col-md-10">
            <p class="form-control-static">{{ \Carbon\Carbon::parse($disponibilites->start_time)->format('d/m/Y H:i') }}</p>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label">Heure de fin:</label>
        <div class="col-sm-12 col-md-10">
            <p class="form-control-static">{{ \Carbon\Carbon::parse($disponibilites->end_time)->format('d/m/Y H:i') }}</p>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label">Statut:</label>
        <div class="col-sm-12 col-md-10">
            <p class="form-control-static">
                @if($disponibilites->status == 'available')
                    Disponible
                @else
                    Indisponible
                @endif
            </p>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label">Créé le:</label>
        <div class="col-sm-12 col-md-10">
            <p>{{ \Carbon\Carbon::parse($disponibilites->created_at)->format('d/m/Y H:i') }}</p>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label">Mis à jour le:</label>
        <div class="col-sm-12 col-md-10">
            <p>{{ \Carbon\Carbon::parse($disponibilites->updated_at)->format('d/m/Y H:i') }}</p>
        </div>
    </div>
</div>
@endsection

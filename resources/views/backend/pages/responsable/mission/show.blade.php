@extends('backend.layouts.template')
@section('content')

<div class="page-header">
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="title">
                <h4>Détails de la mission</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('responsable.home') }}">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('responsable.mission.index') }}">Liste des missions</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Détails de la mission
                    </li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="pd-20 card-box mb-30">
    <div class="clearfix">
        <div class="pull-left">
            <h4 class="text-black h4">Informations de la mission</h4>
            <br><br>
        </div>
        <div class="pull-right">
            <a href="{{ route('responsable.mission.index') }}" class="btn btn-primary" role="button">
                <i class="micon ion-chevron-left"></i> Retour
            </a>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label">Client</label>
        <div class="col-sm-12 col-md-10">
            @if ($missions->client)
                <p>{{ $missions->client->company_name }}</p>
            @else
                <p>Client non assigné</p>
            @endif
        </div>
    </div>


    <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label">Responsable</label>
        <div class="col-sm-12 col-md-10">
            @if ($missions->responsable)
                <p>{{ $missions->responsable->name }}</p>
            @else
                <p>Responsable non assigné</p>
            @endif
        </div>
    </div>


    <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label">Titre de la mission</label>
        <div class="col-sm-12 col-md-10">
            <p>{{ $missions->title }}</p>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label">Description</label>
        <div class="col-sm-12 col-md-10">
            <p>{{ $missions->description ? $missions->description : 'Aucune description' }}</p>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label">Lieu</label>
        <div class="col-sm-12 col-md-10">
            <p>{{ $missions->location ? $missions->location : 'Non spécifié' }}</p>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label">Date de début</label>
        <div class="col-sm-12 col-md-10">
            <p>{{ \Carbon\Carbon::parse($missions->start_date)->format('d/m/Y H:i') }}</p>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label">Date de fin</label>
        <div class="col-sm-12 col-md-10">
            <p>{{ \Carbon\Carbon::parse($missions->end_date)->format('d/m/Y H:i') }}</p>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label">Statut</label>
        <div class="col-sm-12 col-md-10">
            <p>{{ ucfirst($missions->status) }}</p>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label">Créé le</label>
        <div class="col-sm-12 col-md-10">
            <p>{{ \Carbon\Carbon::parse($missions->created_at)->format('d/m/Y H:i') }}</p>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label">Mis à jour le</label>
        <div class="col-sm-12 col-md-10">
            <p>{{ \Carbon\Carbon::parse($missions->updated_at)->format('d/m/Y H:i') }}</p>
        </div>
    </div>

</div>
@endsection

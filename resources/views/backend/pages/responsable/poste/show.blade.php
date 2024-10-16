@extends('backend.layouts.template')
@section('content')
<div class="page-header">
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="title">
                <h4>Détails du Poste</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('responsable.home') }}">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Détails du poste
                    </li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="pd-20 card-box mb-30">
    <div class="clearfix">
        <div class="pull-left">
            <h4 class="text-black h4">Poste : {{ $postes->position_name }}</h4>
            <br>
            <br>
        </div>
        <div class="pull-right">
            <a href="{{ route('responsable.poste.index') }}" class="btn btn-primary" role="button">
                <i class="micon ion-chevron-left"> </i> Retour
            </a>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label">Nom du poste</label>
        <div class="col-sm-12 col-md-10">
            <p>{{ $postes->position_name }}</p>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label">Quota horaire</label>
        <div class="col-sm-12 col-md-10">
            <p>{{ $postes->hourly_quota }}</p>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label">Compétences requises</label>
        <div class="col-sm-12 col-md-10">
            <p>{{ $postes->required_skills ?? 'Aucune compétence requise' }}</p>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label">Informations supplémentaires</label>
        <div class="col-sm-12 col-md-10">
            <p>{{ $postes->additional_information ?? 'Aucune information supplémentaire' }}</p>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label">Créé le</label>
        <div class="col-sm-12 col-md-10">
            <p>{{ \Carbon\Carbon::parse($postes->created_at)->format('d/m/Y H:i') }}</p>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label">Mis à jour le</label>
        <div class="col-sm-12 col-md-10">
            <p>{{ \Carbon\Carbon::parse($postes->updated_at)->format('d/m/Y H:i') }}</p>
        </div>
    </div>

</div>
@endsection

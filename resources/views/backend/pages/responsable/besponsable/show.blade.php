@extends('backend.layouts.template')

@section('content')
<div class="page-header">
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="title">
                <h4>Détails du Responsable</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('besponsable.home') }}">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Détails du Responsable
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
            <a href="{{ route('responsable.besponsable.index') }}" class="btn btn-primary" role="button">
                <i class="micon ion-chevron-left"> </i> Retour
            </a>
        </div>
    </div>
    <br><br>

    <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label">Nom et Prénom:</label>
        <div class="col-sm-12 col-md-10">
            <p class="form-control-static">{{ $responsables->name }}</p>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label">Nom d'utilisateur:</label>
        <div class="col-sm-12 col-md-10">
            <p class="form-control-static">{{ $responsables->username }}</p>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label">Email:</label>
        <div class="col-sm-12 col-md-10">
            <p class="form-control-static">{{ $responsables->email }}</p>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label">Mot de passe:</label>
        <div class="col-sm-12 col-md-10">
            <p class="form-control-static">{{ $responsables->password }}</p>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label">Téléphone:</label>
        <div class="col-sm-12 col-md-10">
            <p class="form-control-static">{{ $responsables->phone }}</p>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label">Adresse:</label>
        <div class="col-sm-12 col-md-10">
            <p class="form-control-static">{{ $responsables->address }}</p>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label">Statut:</label>
        <div class="col-sm-12 col-md-10">
            <p class="form-control-static">{{ $responsables->status }}</p>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label">Créé le</label>
        <div class="col-sm-12 col-md-10">
            <p>{{ \Carbon\Carbon::parse($responsables->created_at)->format('d/m/Y H:i') }}</p>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label">Mis à jour le</label>
        <div class="col-sm-12 col-md-10">
            <p>{{ \Carbon\Carbon::parse($responsables->updated_at)->format('d/m/Y H:i') }}</p>
        </div>
    </div>
</div>
@endsection

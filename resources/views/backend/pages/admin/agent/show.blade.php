@extends('backend.layouts.templateadmin')

@section('content')
<div class="page-header">
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="title">
                <h4>Détails du Agent</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Détails du Agent
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
            <a href="{{ route('admin.agent.index') }}" class="btn btn-primary" role="button">
                <i class="micon ion-chevron-left"> </i> Retour
            </a>
        </div>
    </div>
    <br><br>

    <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label">Nom et Prénom:</label>
        <div class="col-sm-12 col-md-10">
            <p class="form-control-static">{{ $agents->name }}</p>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label">Nom d'utilisateur:</label>
        <div class="col-sm-12 col-md-10">
            <p class="form-control-static">{{ $agents->username }}</p>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label">Email:</label>
        <div class="col-sm-12 col-md-10">
            <p class="form-control-static">{{ $agents->email }}</p>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label">Mot de passe:</label>
        <div class="col-sm-12 col-md-10">
            <p class="form-control-static">{{ $agents->password }}</p>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label">Téléphone:</label>
        <div class="col-sm-12 col-md-10">
            <p class="form-control-static">{{ $agents->phone }}</p>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label">Matricule:</label>
        <div class="col-sm-12 col-md-10">
            <p class="form-control-static">{{ $agents->registration_number }}</p>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label">Adresse:</label>
        <div class="col-sm-12 col-md-10">
            <p class="form-control-static">{{ $agents->address }}</p>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label">Statut:</label>
        <div class="col-sm-12 col-md-10">
            <p class="form-control-static">{{ $agents->status }}</p>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label">Disponibilité:</label>
        <div class="col-sm-12 col-md-10">
            <p class="form-control-static">{{ $agents->disponibilite }}</p>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label">Créé le</label>
        <div class="col-sm-12 col-md-10">
            <p>{{ \Carbon\Carbon::parse($agents->created_at)->format('d/m/Y H:i') }}</p>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label">Mis à jour le</label>
        <div class="col-sm-12 col-md-10">
            <p>{{ \Carbon\Carbon::parse($agents->updated_at)->format('d/m/Y H:i') }}</p>
        </div>
    </div>
</div>
@endsection

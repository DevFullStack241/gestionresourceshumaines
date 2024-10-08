@extends('backend.layouts.templateadmin')
@section('content')
<div class="page-header">
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="title">
                <h4>Afficher les détails du client</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Détails du client
                    </li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="pd-20 card-box mb-30">
    <div class="clearfix">
        <div class="pull-left">
            <h4 class="text-black h4">Informations du client</h4>
            <br>
        </div>
        <div class="pull-right">
            <a href="{{ route('admin.client.index') }}" class="btn btn-primary" role="button">
                <i class="micon ion-chevron-left"> </i>  Retour
            </a>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label">Nom de l'entreprise</label>
        <div class="col-sm-12 col-md-10">
            <p class="form-control-plaintext">{{ $client->company_name }}</p>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label">Raison Sociale</label>
        <div class="col-sm-12 col-md-10">
            <p class="form-control-plaintext">{{ $client->legal_name }}</p>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label">Email</label>
        <div class="col-sm-12 col-md-10">
            <p class="form-control-plaintext">{{ $client->email }}</p>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label">Téléphone</label>
        <div class="col-sm-12 col-md-10">
            <p class="form-control-plaintext">{{ $client->phone }}</p>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label">Adresse</label>
        <div class="col-sm-12 col-md-10">
            <p class="form-control-plaintext">{{ $client->address }}</p>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label">Information Supplémentaire</label>
        <div class="col-sm-12 col-md-10">
            <p class="form-control-plaintext">{{ $client->additional_information }}</p>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label">Créé le</label>
        <div class="col-sm-12 col-md-10">
            <p>{{ \Carbon\Carbon::parse($client->created_at)->format('d/m/Y H:i') }}</p>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label">Mis à jour le</label>
        <div class="col-sm-12 col-md-10">
            <p>{{ \Carbon\Carbon::parse($client->updated_at)->format('d/m/Y H:i') }}</p>
        </div>
    </div>
</div>
@endsection


@extends('backend.layouts.templateadmin')
@section('content')

<div class="page-header">
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="title">
                <h4>Détails de l'affectation</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.affectation.index') }}">Liste des affectations</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Détails de l'affectation
                    </li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="pd-20 card-box mb-30">
    <div class="clearfix">
        <div class="pull-left">
            <h4 class="text-black h4">Informations de l'affectation</h4>
            <br><br>
        </div>
        <div class="pull-right">
            <a href="{{ route('admin.affectation.index') }}" class="btn btn-primary" role="button">
                <i class="micon ion-chevron-left"></i> Retour
            </a>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label">Mission</label>
        <div class="col-sm-12 col-md-10">
            @if ($affectations->mission)
            <p>{{ $affectations->mission->title }}</p>
        @else
            <p>Client non assigné</p>
        @endif
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label">Agent</label>
        <div class="col-sm-12 col-md-10">
            <p>{{ $affectations->agent ? $affectations->agent->name : 'Agent non assigné' }}</p>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label">Poste</label>
        <div class="col-sm-12 col-md-10">
            <p>{{ $affectations->poste ? $affectations->poste->position_name : 'Poste non assigné' }}</p>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label">Date d'affectation</label>
        <div class="col-sm-12 col-md-10">
            <p>{{ \Carbon\Carbon::parse($affectations->assignment_date)->format('d/m/Y') }}</p>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label">Statut</label>
        <div class="col-sm-12 col-md-10">
            <p>{{ ucfirst($affectations->status) }}</p>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label">Créé le</label>
        <div class="col-sm-12 col-md-10">
            <p>{{ \Carbon\Carbon::parse($affectations->created_at)->format('d/m/Y H:i') }}</p>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label">Mis à jour le</label>
        <div class="col-sm-12 col-md-10">
            <p>{{ \Carbon\Carbon::parse($affectations->updated_at)->format('d/m/Y H:i') }}</p>
        </div>
    </div>

</div>
@endsection

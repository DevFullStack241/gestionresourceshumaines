@extends('backend.layouts.templateadmin')

@section('content')

<div class="page-header">
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="title">
                <h4>Création d'une Disponibilité</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Formulaire d'ajout de disponibilité
                    </li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="pd-20 card-box mb-30">
    <div class="clearfix">
        <div class="pull-left">
            <h4 class="text-black h4">Formulaire</h4>
        </div>
        <div class="pull-right">
            <a href="{{ route('admin.disponibilite.index') }}" class="btn btn-primary" role="button">
                <i class="micon ion-chevron-left"></i> Retour
            </a>
        </div>
    </div>
    <br>
    <br>
    <form action="{{ route('admin.disponibilite.store') }}" method="POST">
        @csrf
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Agent</label>
            <div class="col-sm-12 col-md-10">
                <select class="form-control" name="agent_id">
                    <option value="">Sélectionner un agent</option>
                    @foreach ($agents as $agent)
                    <option value="{{ $agent->id }}" {{ old('agent_id') == $agent->id ? 'selected' : '' }}>
                        {{ $agent->name }}
                    </option>
                    @endforeach
                </select>
                @error('agent_id')
                <span class="text-danger ml-2">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Heure de début</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="datetime-local" name="start_time" value="{{ old('start_time') }}">
                @error('start_time')
                <span class="text-danger ml-2">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Heure de fin</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="datetime-local" name="end_time" value="{{ old('end_time') }}">
                @error('end_time')
                <span class="text-danger ml-2">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Statut</label>
            <div class="col-sm-12 col-md-10">
                <select class="form-control" name="status">
                    <option value="available" {{ old('status') == 'available' ? 'selected' : '' }}>Disponible</option>
                    <option value="unavailable" {{ old('status') == 'unavailable' ? 'selected' : '' }}>Indisponible</option>
                </select>
                @error('status')
                <span class="text-danger ml-2">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary btn-lg btn-block">Enregistrer</button>
            </div>
        </div>
    </form>
</div>

@endsection

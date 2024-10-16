@extends('backend.layouts.template')
@section('content')

<div class="page-header">
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="title">
                <h4>Création d'une mission</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('responsable.home') }}">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Formulaire d'ajout de mission
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
            <br><br>
        </div>
        <div class="pull-right">
            <a href="{{ route('responsable.mission.index') }}" class="btn btn-primary" role="button">
                <i class="micon ion-chevron-left"></i> Retour
            </a>
        </div>
    </div>

    <form action="{{ route('responsable.mission.store') }}" method="POST">
        @csrf
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Client</label>
            <div class="col-sm-12 col-md-10">
                <select class="form-control" name="client_id">
                    <option value="">Sélectionner un client</option>
                    @foreach ($clients as $client)
                    <option value="{{ $client->id }}" {{ old('client_id') == $client->id ? 'selected' : '' }}>
                        {{ $client->company_name }}
                    </option>
                    @endforeach
                </select>
                @error('client_id')
                <span class="text-danger ml-2">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Responsable</label>
            <div class="col-sm-12 col-md-10">
                <select class="form-control" name="responsable_id">
                    <option value="">Sélectionner un responsable</option>
                    @foreach ($responsables as $responsable)
                    <option value="{{ $responsable->id }}" {{ old('responsable_id') == $responsable->id ? 'selected' : '' }}>
                        {{ $responsable->name }}
                    </option>
                    @endforeach
                </select>
                @error('responsable_id')
                <span class="text-danger ml-2">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Titre de la mission</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" name="title" placeholder="Saisir le titre de la mission" value="{{ old('title') }}">
                @error('title')
                <span class="text-danger ml-2">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Description</label>
            <div class="col-sm-12 col-md-10">
                <textarea class="form-control" name="description" placeholder="Saisir la description de la mission">{{ old('description') }}</textarea>
                @error('description')
                <span class="text-danger ml-2">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Lieu</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" name="location" placeholder="Saisir le lieu de la mission" value="{{ old('location') }}">
                @error('location')
                <span class="text-danger ml-2">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Date de début</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="datetime-local" name="start_date" value="{{ old('start_date') }}">
                @error('start_date')
                <span class="text-danger ml-2">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Date de fin</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="datetime-local" name="end_date" value="{{ old('end_date') }}">
                @error('end_date')
                <span class="text-danger ml-2">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Statut</label>
            <div class="col-sm-12 col-md-10">
                <select class="form-control" name="status">
                    <option value="upcoming" {{ old('status') == 'upcoming' ? 'selected' : '' }}>À venir</option>
                    <option value="in progress" {{ old('status') == 'in progress' ? 'selected' : '' }}>En cours</option>
                    <option value="completed" {{ old('status') == 'completed' ? 'selected' : '' }}>Complétée</option>
                </select>
                @error('status')
                <span class="text-danger ml-2">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-2">
                <div class="input-group mb-0">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Enregistrer</button>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection

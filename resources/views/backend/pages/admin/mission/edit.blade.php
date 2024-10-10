@extends('backend.layouts.templateadmin')

@section('content')
<div class="page-header">
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="title">
                <h4>Édition de la mission</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Édition de la mission</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="pd-20 card-box mb-30">
    <form action="{{ route('admin.mission.update', $missions->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- Méthode PUT pour l'édition -->

        <!-- Sélection du client -->
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Client</label>
            <div class="col-sm-12 col-md-10">
                <select name="client_id" class="form-control">
                    @foreach($clients as $client)
                        <option value="{{ $client->id }}" {{ $missions->client_id == $client->id ? 'selected' : '' }}>
                            {{ $client->company_name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- Sélection du responsable -->
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Responsable</label>
            <div class="col-sm-12 col-md-10">
                <select name="responsable_id" class="form-control">
                    @foreach($responsables as $responsable)
                        <option value="{{ $responsable->id }}" {{ $missions->responsable_id == $responsable->id ? 'selected' : '' }}>
                            {{ $responsable->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- Titre de la mission -->
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Titre de la mission</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" name="title" value="{{ old('title', $missions->title) }}" placeholder="Saisir le titre de la mission">
                @error('title')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <!-- Description de la mission -->
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Description</label>
            <div class="col-sm-12 col-md-10">
                <textarea class="form-control" name="description" placeholder="Saisir la description de la mission">{{ old('description', $missions->description) }}</textarea>
                @error('description')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <!-- Lieu de la mission -->
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Lieu</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" name="location" value="{{ old('location', $missions->location) }}" placeholder="Saisir le lieu de la mission">
                @error('location')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <!-- Date de début -->
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Date de début</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="datetime-local" name="start_date" value="{{ old('start_date', $missions->start_date ? \Carbon\Carbon::parse($missions->start_date)->format('Y-m-d\TH:i') : '') }}">
                @error('start_date')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <!-- Date de fin -->
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Date de fin</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="datetime-local" name="end_date" value="{{ old('end_date', $missions->end_date ? \Carbon\Carbon::parse($missions->end_date)->format('Y-m-d\TH:i') : '') }}">
                @error('end_date')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <!-- Statut de la mission -->
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Statut</label>
            <div class="col-sm-12 col-md-10">
                <select name="status" class="form-control">
                    <option value="upcoming" {{ $missions->status == 'upcoming' ? 'selected' : '' }}>À venir</option>
                    <option value="in progress" {{ $missions->status == 'in progress' ? 'selected' : '' }}>En cours</option>
                    <option value="completed" {{ $missions->status == 'completed' ? 'selected' : '' }}>Terminée</option>
                </select>
                @error('status')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-2">
                <div class="input-group mb-0">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Mettre à jour</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

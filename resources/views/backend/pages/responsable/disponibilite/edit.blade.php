@extends('backend.layouts.template')

@section('content')

<div class="page-header">
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="title">
                <h4>Modification d'une Disponibilité</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('responsable.home') }}">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Formulaire de modification de disponibilité
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
            <a href="{{ route('responsable.disponibilite.index') }}" class="btn btn-primary" role="button">
                <i class="micon ion-chevron-left"></i> Retour
            </a>
        </div>
    </div>
    <br>
    <br>
    <form action="{{ route('responsable.disponibilite.update', $disponibilites->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Agent</label>
            <div class="col-sm-12 col-md-10">
                <select class="form-control" name="agent_id">
                    <option value="">Sélectionner un agent</option>
                    @foreach ($agents as $agents)
                    <option value="{{ $agents->id }}" {{ $disponibilites->agent_id == $agents->id ? 'selected' : '' }}>
                        {{ $agents->name }}
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
                <input class="form-control" type="datetime-local" name="start_time"
                    value="{{ old('start_time', \Carbon\Carbon::parse($disponibilites->start_time)->format('Y-m-d\TH:i')) }}">
                @error('start_time')
                    <span class="text-danger ml-2">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Heure de fin</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="datetime-local" name="end_time"
                    value="{{ old('end_time', \Carbon\Carbon::parse($disponibilites->end_time)->format('Y-m-d\TH:i')) }}">
                @error('end_time')
                    <span class="text-danger ml-2">{{ $message }}</span>
                @enderror
            </div>
        </div>


        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Statut</label>
            <div class="col-sm-12 col-md-10">
                <select class="form-control" name="status">
                    <option value="available" {{ $disponibilites->status == 'available' ? 'selected' : '' }}>Disponible</option>
                    <option value="unavailable" {{ $disponibilites->status == 'unavailable' ? 'selected' : '' }}>Indisponible</option>
                </select>
                @error('status')
                <span class="text-danger ml-2">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary btn-lg btn-block">Modifier</button>
            </div>
        </div>
    </form>
</div>

@endsection

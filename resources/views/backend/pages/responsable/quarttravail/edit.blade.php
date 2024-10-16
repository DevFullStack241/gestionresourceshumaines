@extends('backend.layouts.template')
@section('content')

<div class="page-header">
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="title">
                <h4>Modifier le Quart de Travail</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('responsable.home') }}">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Modifier le Quart de Travail
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
            <a href="{{ route('responsable.quarttravail.index') }}" class="btn btn-primary" role="button">
                <i class="micon ion-chevron-left"></i> Retour
            </a>
        </div>
    </div>

    <form action="{{ route('responsable.quarttravail.update', $quartTravails->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Affectation</label>
            <div class="col-sm-12 col-md-10">
                <select class="form-control" name="affectation_id">
                    <option value="">Sélectionner une affectation</option>
                    @foreach ($affectations as $affectation)
                    <option value="{{ $affectation->id }}" {{ $quartTravails->affectation_id == $affectation->id ? 'selected' : '' }}>
                        {{ $affectation->poste->position_name }}
                    </option>
                    @endforeach
                </select>
                @error('affectation_id')
                <span class="text-danger ml-2">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Heure de début</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="datetime-local" name="start_time" value="{{ $quartTravails->start_time }}">
                @error('start_time')
                <span class="text-danger ml-2">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Heure de fin</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="datetime-local" name="end_time" value="{{ $quartTravails->end_time }}">
                @error('end_time')
                <span class="text-danger ml-2">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Heures de travail</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="number" name="work_hours" value="{{ $quartTravails->work_hours }}">
                @error('work_hours')
                <span class="text-danger ml-2">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary btn-lg btn-block">Mettre à jour</button>
            </div>
        </div>
    </form>
</div>

@endsection

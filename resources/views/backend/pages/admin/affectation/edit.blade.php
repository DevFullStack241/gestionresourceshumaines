@extends('backend.layouts.templateadmin')
@section('content')

<div class="page-header">
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="title">
                <h4>Modifier l'affectation</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Modification de l'affectation
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
            <a href="{{ route('admin.affectation.index') }}" class="btn btn-primary" role="button">
                <i class="micon ion-chevron-left"></i> Retour
            </a>
        </div>
    </div>

    <form action="{{ route('admin.affectation.update', $affectations->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Mission</label>
            <div class="col-sm-12 col-md-10">
                <select class="form-control" name="mission_id">
                    @foreach ($missions as $mission)
                    <option value="{{ $mission->id }}" {{ $affectations->mission_id == $mission->id ? 'selected' : '' }}>
                        {{ $mission->title }}
                    </option>
                    @endforeach
                </select>
                @error('mission_id')
                <span class="text-danger ml-2">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Agent</label>
            <div class="col-sm-12 col-md-10">
                <select class="form-control" name="agent_id">
                    @foreach ($agents as $agent)
                    <option value="{{ $agent->id }}" {{ $affectations->agent_id == $agent->id ? 'selected' : '' }}>
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
            <label class="col-sm-12 col-md-2 col-form-label">Poste</label>
            <div class="col-sm-12 col-md-10">
                <select class="form-control" name="poste_id">
                    @foreach ($postes as $poste)
                    <option value="{{ $poste->id }}" {{ $affectations->poste_id == $poste->id ? 'selected' : '' }}>
                        {{ $poste->position_name }}
                    </option>
                    @endforeach
                </select>
                @error('poste_id')
                <span class="text-danger ml-2">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Date d'affectation</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="datetime-local" name="assignment_date" value="{{ $affectations->assignment_date }}">
                @error('assignment_date')
                <span class="text-danger ml-2">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Statut</label>
            <div class="col-sm-12 col-md-10">
                <select class="form-control" name="status">
                    <option value="pending" {{ $affectations->status == 'pending' ? 'selected' : '' }}>En attente</option>
                    <option value="confirmed" {{ $affectations->status == 'confirmed' ? 'selected' : '' }}>Confirmée</option>
                    <option value="cancelled" {{ $affectations->status == 'cancelled' ? 'selected' : '' }}>Annulée</option>
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

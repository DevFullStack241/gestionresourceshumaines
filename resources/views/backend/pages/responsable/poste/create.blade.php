@extends('backend.layouts.template')
@section('content')
<div class="page-header">
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="title">
                <h4>Création d'un Poste</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('responsable.home') }}">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Formulaire d'ajout de poste
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
            <br>
            <br>
        </div>
        <div class="pull-right">
            <a href="{{ route('responsable.poste.index') }}" class="btn btn-primary" role="button">
                <i class="micon ion-chevron-left"> </i> Retour
            </a>
        </div>
    </div>
    <form action="{{ route('responsable.poste.store') }}" method="POST">
        @csrf
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Nom du poste</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" name="position_name" placeholder="Saisir le nom du poste" value="{{ old('position_name') }}">
                @error('position_name')
                <span class="text-danger ml-2">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Quota horaire</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="number" name="hourly_quota" placeholder="Saisir le quota horaire" value="{{ old('hourly_quota') }}">
                @error('hourly_quota')
                <span class="text-danger ml-2">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Compétences requises</label>
            <div class="col-sm-12 col-md-10">
                <textarea class="form-control" name="required_skills" placeholder="Saisir les compétences requises">{{ old('required_skills') }}</textarea>
                @error('required_skills')
                <span class="text-danger ml-2">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Informations supplémentaires</label>
            <div class="col-sm-12 col-md-10">
                <textarea class="form-control" name="additional_information" placeholder="Saisir des informations supplémentaires">{{ old('additional_information') }}</textarea>
                @error('additional_information')
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

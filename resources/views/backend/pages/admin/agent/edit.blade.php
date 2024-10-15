@extends('backend.layouts.templateadmin')
@section('content')
<div class="page-header">
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="title">
                <h4>Création d'un agent</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Formulaire d'ajout agent
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
            <a href="{{ route('admin.agent.index') }}" class="btn btn-primary" role="button">
                <i class="micon ion-chevron-left"> </i>  Retour
            </a>
        </div>
    </div>
    <br>
    <br>
    <form action="{{ route('admin.agent.update', $agents->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- Cela spécifie que la requête est de type PUT pour la mise à jour -->
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Nom et Prénom</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" placeholder="Saisir votre et prénom" name="name" value="{{ old('name', $agents->name) }}">
                @error('name')
                <span class="text-danger ml-2">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Nom d'utilisateur</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" placeholder="Saisir votre et prénom" name="username" value="{{ old('name', $agents->username) }}">
                @error('username')
                <span class="text-danger ml-2">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Email</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" placeholder="Saisir votre adresse email" name="email" type="email"
                    value="{{ old('email', $agents->email) }}">
                @error('email')
                <span class="text-danger ml-2">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Matricule</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" name="registration_number" type="text" placeholder="Saisir votre matricule" value="{{ old('registration_number', $agents->registration_number) }}">
                @error('registration_number')
                <span class="text-danger ml-2">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-2">
                <div class="input-group mb-0">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Mise à jour</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection


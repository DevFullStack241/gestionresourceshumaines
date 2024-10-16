@extends('backend.layouts.template')
@section('content')
<div class="page-header">
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="title">
                <h4>Création d'un responsable</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('besponsable.home') }}">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Formulaire d'ajout responsable
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
            <a href="{{ route('responsable.besponsable.index') }}" class="btn btn-primary" role="button">
                <i class="micon ion-chevron-left"> </i>  Retour
            </a>
        </div>
    </div>
    <br>
    <br>
    <form action="{{ route('responsable.besponsable.store') }}" method="POST">
        @csrf
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Nom et Prénom</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" placeholder="Saisir votre et prénom" name="name" value="{{ old('name') }}">
                @error('name')
                <span class="text-danger ml-2">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Email</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" placeholder="Saisir votre adresse email" name="email" type="email"
                    value="{{ old('email') }}">
                @error('email')
                <span class="text-danger ml-2">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Mot de passe</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" placeholder="Saisir votre mot de passe" name="password" type="password">
                @error('password')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Confirmez le mot de passe</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" placeholder="Confirmez votre mot de passe" name="confirm_password" type="password">
                @error('confirm_password')
                <span class="text-danger">{{ $message }}</span>
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

@extends('backend.layouts.templateadmin')
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
                        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
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
            <br>
            <br>
        </div>
        <div class="pull-right">
            <a href="{{ route('admin.client.index') }}" class="btn btn-primary" role="button">
                <i class="micon ion-chevron-left"> </i>  Retour
            </a>
        </div>
    </div>
    <form action="{{ route('admin.client.update', $clients->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- Cela spécifie que la requête est de type PUT pour la mise à jour -->
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Nom de l'entreprise</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" name="company_name" placeholder="Saisir le nom de l'entreprise" value="{{ old('company_name', $clients->company_name) }}">
                @error('company_name')
                <span class="text-danger ml-2">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Raison Social</label>
            <div class="col-sm-12 col-md-10">
                <textarea class="form-control" name="legal_name">{{ old('legal_name', $clients->legal_name) }}</textarea>
                @error('legal_name')
                <span class="text-danger ml-2">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Email</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" name="email" placeholder="Saisir votre adresse email" type="email" value="{{ old('email', $clients->email) }}">
                @error('email')
                <span class="text-danger ml-2">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Téléphone</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" name="phone" placeholder="Saisir votre numéro de téléphone" type="tel" value="{{ old('phone', $clients->phone) }}">
                @error('phone')
                <span class="text-danger ml-2">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Adresse</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" name="address" type="text" placeholder="Saisir votre adresse" value="{{ old('address', $clients->address) }}">
                @error('address')
                <span class="text-danger ml-2">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Information Supplementaire</label>
            <div class="col-sm-12 col-md-10">
                <textarea class="form-control" name="additional_information">{{ old('additional_information', $clients->additional_information) }}</textarea>
                @error('additional_information')
                <span class="text-danger ml-2">{{ $message }}</span>
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


@extends('backend.layouts.templateadmin')
@section('content')

@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

@if (session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif

<div class="page-header">
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="title">
                <h4>Liste des responsables</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Liste des responsables
                    </li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="pd-20 card-box mb-30">
    <div class="clearfix mb-20">
        <div class="pull-left">
            <a href="{{ route('admin.responsable.create') }}" class="btn btn-primary" role="button">
                <i class="micon dw dw-apartment"></i> Ajouter un responsable
            </a>
        </div>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nom</th>
                <th scope="col">Nom Utilisateur</th>
                <th scope="col">Email</th>
                <th scope="col">Mot de passe</th>
                <th scope="col">Adresse</th>
                <th scope="col">Téléphone</th>
                <th scope="col">Statut</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($responsables as $responsable)
            <tr>
                <th scope="row">{{ $responsable->id }}</th>
                <td>{{ $responsable->name }}</td>
                <td>{{ $responsable->username }}</td>
                <td>{{ $responsable->email }}</td>
                <td>{{ $responsable->password }}</td>
                <td>{{ $responsable->address }}</td>
                <td>{{ $responsable->phone }}</td>
                <td>{{ $responsable->status }}</td>
                <td>
                    <div class="dropdown">
                        <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#"
                            role="button" data-toggle="dropdown" aria-expanded="false">
                            <i class="dw dw-more"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                            <a class="dropdown-item" href="{{ route('admin.responsable.show', $responsable->id) }}"><i
                                    class="dw dw-eye"></i> View</a>
                            <a class="dropdown-item" href="{{ route('admin.responsable.edit', $responsable->id) }}"><i
                                    class="dw dw-edit2"></i> Edit</a>

                            <form action="{{ route('admin.responsable.delete', $responsable->id) }}" method="POST"
                                onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce client ?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="dropdown-item" style="border: none; background: none;">
                                    <i class="dw dw-delete-3"></i> Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

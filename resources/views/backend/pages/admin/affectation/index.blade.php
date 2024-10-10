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
                <h4>Liste des affectations</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Liste des affectations
                    </li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="pd-20 card-box mb-30">
    <div class="clearfix mb-20">
        <div class="pull-left">
            <a href="{{ route('admin.affectation.create') }}" class="btn btn-primary" role="button">
                <i class="micon dw dw-apartment"></i> Ajouter une affectation
            </a>
        </div>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Mission</th>
                <th scope="col">Agent</th>
                <th scope="col">Poste</th>
                <th scope="col">Date d'affectation</th>
                <th scope="col">Statut</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($affectations as $affectation)
            <tr>
                <th scope="row">{{ $affectation->id }}</th>
                <td>{{ $affectation->mission->title }}</td>
                <td>{{ $affectation->agent->name }}</td>
                <td>{{ $affectation->poste->position_name }}</td>
                <td>{{ $affectation->assignment_date }}</td>
                <td>{{ ucfirst($affectation->status) }}</td>
                <td>
                    <div class="dropdown">
                        <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#"
                            role="button" data-toggle="dropdown" aria-expanded="false">
                            <i class="dw dw-more"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                            <a class="dropdown-item" href="{{ route('admin.affectation.show', $affectation->id) }}">
                                <i class="dw dw-eye"></i> Voir
                            </a>
                            <a class="dropdown-item" href="{{ route('admin.affectation.edit', $affectation->id) }}">
                                <i class="dw dw-edit2"></i> Modifier
                            </a>
                            <form action="{{ route('admin.affectation.delete', $affectation->id) }}" method="POST"
                                onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette affectation ?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="dropdown-item" style="border: none; background: none;">
                                    <i class="dw dw-delete-3"></i> Supprimer
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

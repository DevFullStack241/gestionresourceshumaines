@extends('backend.layouts.template')
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
                <h4>Liste des Quart de Travail</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('responsable.home') }}">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Liste des Quart de Travail
                    </li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="pd-20 card-box mb-30">
    <div class="clearfix mb-20">
        <div class="pull-left">
            <a href="{{ route('responsable.quarttravail.create') }}" class="btn btn-primary" role="button">
                <i class="micon dw dw-apartment"></i> Ajouter un Quart de Travail
            </a>
        </div>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Affectation</th>
                <th scope="col">Date de début</th>
                <th scope="col">Date de fin</th>
                <th scope="col">Heures de travail</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($quartTravails as $quartTravails)
            <tr>
                <th scope="row">{{ $quartTravails->id }}</th>
                <td>{{ $quartTravails->affectation->poste->position_name }}</td>
                <td>{{ \Carbon\Carbon::parse($quartTravails->start_time)->format('d/m/Y H:i') }}</td>
                <td>{{ \Carbon\Carbon::parse($quartTravails->end_time)->format('d/m/Y H:i') }}</td>
                <td>{{ $quartTravails->work_hours ?? 'Non défini' }}</td>
                <td>
                    <div class="dropdown">
                        <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#"
                            role="button" data-toggle="dropdown" aria-expanded="false">
                            <i class="dw dw-more"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                            <a class="dropdown-item" href="{{ route('responsable.quarttravail.show', $quartTravails->id) }}">
                                <i class="dw dw-eye"></i> Voir
                            </a>
                            <a class="dropdown-item" href="{{ route('responsable.quarttravail.edit', $quartTravails->id) }}">
                                <i class="dw dw-edit2"></i> Modifier
                            </a>
                            <form action="{{ route('responsable.quarttravail.delete', $quartTravails->id) }}" method="POST"
                                onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce quart de travail ?');">
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

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
                <h4>Liste des clients</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Liste des postes
                    </li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="pd-20 card-box mb-30">
    <div class="clearfix mb-20">
        <div class="pull-left">
            <a href="{{ route('admin.poste.create') }}" class="btn btn-primary" role="button">
                <i class="micon dw dw-apartment"></i> Ajouter un poste
            </a>
        </div>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nom du poste</th>
                <th scope="col">Quota horaire</th>
                <th scope="col">Competences requises</th>
                <th scope="col">Information Supplementaire</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($postes as $postes)
            <tr>
                <th scope="row">{{ $postes->id }}</th>
                <td>{{ $postes->position_name }}</td>
                <td>{{ $postes->hourly_quota }}</td>
                <td style="text-align: justify;">{{ $postes->required_skills }}</td>
                <td style="text-align: justify;">{{ $postes->additional_information }}</td>
                <td>
                    <div class="dropdown">
                        <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#"
                            role="button" data-toggle="dropdown" aria-expanded="false">
                            <i class="dw dw-more"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                            <a class="dropdown-item" href="{{ route('admin.poste.show', $postes->id) }}"><i
                                    class="dw dw-eye"></i> View</a>
                            <a class="dropdown-item" href="{{ route('admin.poste.edit', $postes->id) }}"><i
                                    class="dw dw-edit2"></i> Edit</a>

                            <form action="{{ route('admin.poste.delete', $postes->id) }}" method="POST"
                                onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce poste ?');">
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

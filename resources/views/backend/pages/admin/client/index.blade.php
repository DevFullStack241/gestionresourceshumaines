@extends('backend.layouts.templateadmin')
@section('content')
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
                        Liste des clients
                    </li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="pd-20 card-box mb-30">
    <div class="clearfix mb-20">
        <div class="pull-left">
            <a href="{{ route('admin.client.create') }}" class="btn btn-primary" role="button">
                <i class="micon dw dw-apartment"></i> Ajouter un client
            </a>
        </div>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nom de l'entreprise</th>
                <th scope="col">Raison Social</th>
                <th scope="col">Email</th>
                <th scope="col">Téléphone</th>
                <th scope="col">Adresse</th>
                <th scope="col">Information Supplementaire</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clients as $client)
            <tr>
                <th scope="row">{{ $client->id }}</th>
                <td>{{ $client->company_name }}</td>
                <td style="text-align: justify;">{{ $client->legal_name }}</td>
                <td>{{ $client->email }}</td>
                <td>{{ $client->phone }}</td>
                <td>{{ $client->address }}</td>
                <td style="text-align: justify;">{{ $client->additional_information }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

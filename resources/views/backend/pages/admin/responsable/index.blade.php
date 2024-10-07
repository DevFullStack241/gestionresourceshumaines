@extends('backend.layouts.templateadmin')
@section('content')
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

<div class="card-box mb-10">
    <div class="pd-10">
        <a href="{{ route('admin.responsable.create') }}" class="dropdown-toggle no-arrow">
            <span class="micon fa fa-user-plus"></span
            >
            <br>
            <span class="mtext">Ajouter un responsable</span>
        </a>
    </div>
    <div class="pb-20">
        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
            <div class="row">
                <div class="col-sm-12">
                    <table class="data-table table stripe hover nowrap dataTable no-footer dtr-inline"
                        id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                        <thead>
                            <tr role="row">
                                <th class="table-plus datatable-nosort sorting_disabled" rowspan="1" colspan="1"
                                    aria-label="Name">ID</th>
                                <th class="table-plus datatable-nosort sorting_disabled" rowspan="1" colspan="1"
                                    aria-label="Name">Nom</th>
                                <th class="table-plus datatable-nosort sorting_disabled" rowspan="1" colspan="1"
                                    aria-label="Name">Nom utilisateur</th>
                                <th class="table-plus datatable-nosort sorting_disabled" rowspan="1" colspan="1"
                                    aria-label="Name">Email</th>
                                <th class="table-plus datatable-nosort sorting_disabled" rowspan="1" colspan="1"
                                    aria-label="Name">Mot de passe</th>
                                <th class="table-plus datatable-nosort sorting_disabled" rowspan="1" colspan="1"
                                    aria-label="Name">Adresse</th>
                                <th class="table-plus datatable-nosort sorting_disabled" rowspan="1" colspan="1"
                                    aria-label="Name">Téléphone</th>
                                <th class="table-plus datatable-nosort sorting_disabled" rowspan="1" colspan="1"
                                    aria-label="Name">Staut</th>
                                <th class="datatable-nosort sorting_disabled" rowspan="1" colspan="1"
                                    aria-label="Action">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($responsables as $responsable)
                            <tr role="row" class="odd">
                                <td>{{ $responsable->id }}</td>
                                <td>{{ $responsable->name }}</td>
                                <td>{{ $responsable->username }}</td>
                                <td>{{ $responsable->email }}</td>
                                <td>{{ $responsable->password }}</td>
                                <td>{{ $responsable->address }}</td>
                                <td>{{ $responsable->phone }}</td>
                                <td>{{ $responsable->status }}</td>
                                <td>
                                    <div class="dropdown">
                                        <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                                            href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                                            <i class="dw dw-more"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list" style="">
                                            <a class="dropdown-item" href="#"><i class="dw dw-eye"></i> View</a>
                                            <a class="dropdown-item" href="#"><i class="dw dw-edit2"></i> Edit</a>
                                            <a class="dropdown-item" href="#"><i class="dw dw-delete-3"></i> Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-5">
                    <div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">1-10 of
                        12 entries</div>
                </div>
                <div class="col-sm-12 col-md-7">
                    <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                        <ul class="pagination">
                            <li class="paginate_button page-item previous disabled" id="DataTables_Table_0_previous"><a
                                    href="#" aria-controls="DataTables_Table_0" data-dt-idx="0" tabindex="0"
                                    class="page-link"><i class="ion-chevron-left"></i></a></li>
                            <li class="paginate_button page-item active"><a href="#" aria-controls="DataTables_Table_0"
                                    data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                            <li class="paginate_button page-item "><a href="#" aria-controls="DataTables_Table_0"
                                    data-dt-idx="2" tabindex="0" class="page-link">2</a></li>
                            <li class="paginate_button page-item next" id="DataTables_Table_0_next"><a href="#"
                                    aria-controls="DataTables_Table_0" data-dt-idx="3" tabindex="0" class="page-link"><i
                                        class="ion-chevron-right"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

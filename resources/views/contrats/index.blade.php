@extends('adminlte::page')

@section('title', 'Liste des Contrats')

@section('content_header')
    <div class="header my-4 d-flex justify-content-between">
        <h4 class="">Liste des Contrats</h4>
        <a href="/contrats/create" class="d-block btn btn-success">nouveau Contrat</a>
    </div>
@stop

@section('content')
    @include('components.messages_alert')

    <div class="section_table">
        <div class="">

            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>Nom</th>
                    <th>Adresse</th>
                    <th>Capacité</th>
                    <th>Fournisseur</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($contrats as $contrat)
                    <tr class="align-middle">
                        <td>{{$contrat->nom}}</td>
                        <td>{{$contrat->adresse}}</td>
                        <td>{{$contrat->capacite}}</td>
                        <td>{{$contrat->fournisseur->nom}}</td>
                        <td>
                            <a href="/contrats/{{$contrat->id}}/afficher" class="text-info me-1"><i class="far fa-fw fa-eye"></i></a>
                            <a href="/contrats/{{$contrat->id}}/edit" class="text-warning me-1"><i class="fas fa-fw fa-pencil-alt"></i></a>
                            <form class="d-inline-block" id="deleteForm{{$contrat->id}}" action="/contrats/{{$contrat->id}}" method="POST">
                                @method('DELETE')
                                @csrf
                                <input type="hidden" name="id" value="{{$contrat->id}}">
                                <button class="border-0 text-danger bg-transparent p-0" onclick="confirmDelete(event, {{$contrat->id}})"><i class="fas fa-fw fa-trash-alt"></i></button>
                            </form>

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center pt-3">
                {{ $contrats->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>

@stop


@section('js')
    <script>
        function confirmDelete(event, contratId) {
            event.preventDefault();

            if (confirm('Êtes-vous sûr(e) de vouloir supprimer cet enregistrement?')) {
                document.getElementById('deleteForm'+contratId).submit();
            }
        }
    </script>
@stop

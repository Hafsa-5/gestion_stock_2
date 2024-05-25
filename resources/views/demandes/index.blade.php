@extends('adminlte::page')

@section('title', 'Liste des Demandes')

@section('content_header')
    <div class="header my-4 d-flex justify-content-between">
        <h4 class="">Liste des Demandes</h4>
        <a href="/demandes/create" class="d-block btn btn-success">nouveau Demande</a>
    </div>
@stop

@section('content')
    @include('components.messages_alert')

    <div class="section_table">
        <div class="">

            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>Date de demande</th>
                    <th>Nom de l'agent</th>
                    <th>Prénom de l'agent</th>
                    <th>phone de l'agent</th>
                    <th>Statut</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($demandes as $demande)
                    <tr class="align-middle">
                        <td>{{$demande->date_demande}}</td>
                        <td>{{$demande->agent->nom}}</td>
                        <td>{{$demande->agent->prenom}}</td>
                        <td>{{$demande->agent->phone}}</td>
                        <td>{{$demande->statut}}</td>
                        <td>
                            <a href="/demandes/{{$demande->id}}/afficher" class="text-info me-1"><i class="far fa-fw fa-eye"></i></a>
                            <a href="/demandes/{{$demande->id}}/edit" class="text-warning me-1"><i class="fas fa-fw fa-pencil-alt"></i></a>
                            <form id="deleteForm{{$demande->id}}" class="d-inline-block" action="/demandes/{{$demande->id}}" method="POST">
                                @method('DELETE')
                                @csrf
                                <input type="hidden" name="id" value="{{$demande->id}}">
                                <button class="border-0 text-danger bg-transparent p-0"  onclick="confirmDelete(event, {{$demande->id}})"><i class="fas fa-fw fa-trash-alt"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center pt-3">
                {{ $demandes->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>

@stop

@section('js')
    <script>
        function confirmDelete(event, demandeId) {
            event.preventDefault();

            if (confirm('Êtes-vous sûr(e) de vouloir supprimer cet enregistrement?')) {
                document.getElementById('deleteForm'+demandeId).submit();
            }
        }
    </script>
@stop




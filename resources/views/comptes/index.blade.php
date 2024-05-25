@extends('adminlte::page')

@section('title', 'Liste des Agents')

@section('content_header')
    <div class="header my-4 d-flex justify-content-between">
        <h4 class="">Liste des Agents</h4>
        <a href="/comptes/create" class="d-block btn btn-success">nouveau Agent</a>
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
                    <th>Prénom</th>
                    <th>Phone</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($comptes as $compte)
                    <tr class="align-middle">
                        <td>{{$compte->agent->nom}}</td>
                        <td>{{$compte->agent->prenom}}</td>
                        <td>{{$compte->agent->phone}}</td>
                        <td>{{$compte->username}}</td>
                        <td>{{$compte->email}}</td>
                        <td>{{$compte->getRoleNames()->first()}}</td>
                        <td>
                            <a href="/comptes/{{$compte->id}}/afficher" class="text-info me-1"><i class="far fa-fw fa-eye"></i></a>
                            <a href="/comptes/{{$compte->id}}/edit" class="text-warning me-1"><i class="fas fa-fw fa-pencil-alt"></i></a>
                            <form id="deleteForm{{$compte->id}}" class="d-inline-block" action="/comptes/{{$compte->id}}" method="POST">
                                @method('DELETE')
                                @csrf
                                <input type="hidden" name="id" value="{{$compte->id}}">
                                <button class="border-0 text-danger bg-transparent p-0"  onclick="confirmDelete(event, {{$compte->id}})"><i class="fas fa-fw fa-trash-alt"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center pt-3">
                {{ $comptes->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>

@stop

@section('js')
    <script>
        function confirmDelete(event, userId) {
            event.preventDefault();

            if (confirm('Êtes-vous sûr(e) de vouloir supprimer cet enregistrement?')) {
                document.getElementById('deleteForm'+userId).submit();
            }
        }
    </script>
@stop




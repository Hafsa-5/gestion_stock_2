@extends('adminlte::page')

@section('title', 'Liste des Entités')

@section('content_header')
    <div class="header my-4 d-flex justify-content-between">
        <h4 class="">Liste des Entités</h4>
        <a href="/entites/create" class="d-block btn btn-success">nouveau Entité</a>
    </div>
@stop

@section('content')
    @include('components.messages_alert')

    <div class="section_table">
        <div class="">

            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>nom</th>
                    <th>adresse</th>
                    <th>Phone</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($entites as $entite)
                    <tr class="align-middle">
                        <td>{{$entite->nom}}</td>
                        <td>{{$entite->adresse}}</td>
                        <td>{{$entite->phone}}</td>
                        <td>
                            <a href="/entites/{{$entite->id}}/afficher" class="text-info me-1"><i class="far fa-fw fa-eye"></i></a>
                            <a href="/entites/{{$entite->id}}/edit" class="text-warning me-1"><i class="fas fa-fw fa-pencil-alt"></i></a>
                            <form class="d-inline-block" id="deleteForm{{$entite->id}}" action="/entites/{{$entite->id}}" method="POST">
                                @method('DELETE')
                                @csrf
                                <input type="hidden" name="id" value="{{$entite->id}}">
                                <button class="border-0 text-danger bg-transparent p-0" onclick="confirmDelete(event, {{$entite->id}})"><i class="fas fa-fw fa-trash-alt"></i></button>
                            </form>

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center pt-3">
                {{ $entites->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>

@stop


@section('js')
    <script>
        function confirmDelete(event, entiteId) {
            event.preventDefault();

            if (confirm('Êtes-vous sûr(e) de vouloir supprimer cet enregistrement?')) {
                document.getElementById('deleteForm'+entiteId).submit();
            }
        }
    </script>
@stop

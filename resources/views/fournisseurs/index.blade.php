@extends('adminlte::page')

@section('title', 'Liste des Fournisseurs')

@section('content_header')
    <div class="header my-4 d-flex justify-content-between">
        <h4 class="">Liste des Fournisseurs</h4>
        <a href="/fournisseurs/create" class="d-block btn btn-success">nouveau Fournisseur</a>
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
                @foreach($fournisseurs as $fournisseur)
                    <tr class="align-middle">
                        <td>{{$fournisseur->nom}}</td>
                        <td>{{$fournisseur->adresse}}</td>
                        <td>{{$fournisseur->phone}}</td>
                        <td>
                            <a href="/fournisseurs/{{$fournisseur->id}}/afficher" class="text-info me-1"><i class="far fa-fw fa-eye"></i></a>
                            <a href="/fournisseurs/{{$fournisseur->id}}/edit" class="text-warning me-1"><i class="fas fa-fw fa-pencil-alt"></i></a>
                            <form class="d-inline-block" id="deleteForm{{$fournisseur->id}}" action="/fournisseurs/{{$fournisseur->id}}" method="POST">
                                @method('DELETE')
                                @csrf
                                <input type="hidden" name="id" value="{{$fournisseur->id}}">
                                <button class="border-0 text-danger bg-transparent p-0" onclick="confirmDelete(event, {{$fournisseur->id}})"><i class="fas fa-fw fa-trash-alt"></i></button>
                            </form>

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center pt-3">
                {{ $fournisseurs->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>

@stop

@section('js')
    <script>
        function confirmDelete(event, fournisseurId) {
            event.preventDefault();

            if (confirm('Êtes-vous sûr(e) de vouloir supprimer cet enregistrement?')) {
                document.getElementById('deleteForm'+fournisseurId).submit();
            }
        }
    </script>
@stop




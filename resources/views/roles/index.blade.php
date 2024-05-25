@extends('adminlte::page')

@section('title', 'Liste des Roles')

@section('content_header')
    <div class="header my-4 d-flex justify-content-between">
        <h4 class="">Liste des Roles</h4>
        <a href="/roles/create" class="d-block btn btn-success">nouveau Role</a>
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
                    <th>Description</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($roles as $role)
                    <tr class="align-middle">
                        <td>{{$role->name}}</td>
                        <td>{{$role->description}}</td>
                        <td>
                            <a href="/roles/{{$role->id}}/afficher" class="text-info me-1"><i class="far fa-fw fa-eye"></i></a>
                            <a href="/roles/{{$role->id}}/edit" class="text-warning me-1"><i class="fas fa-fw fa-pencil-alt"></i></a>
                            <form class="d-inline-block" id="deleteForm{{$role->id}}" action="/roles/{{$role->id}}" method="POST">
                                @method('DELETE')
                                @csrf
                                <input type="hidden" name="id" value="{{$role->id}}">
                                <button class="border-0 text-danger bg-transparent p-0" onclick="confirmDelete(event, {{$role->id}})"><i class="fas fa-fw fa-trash-alt"></i></button>
                            </form>

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center pt-3">
                {{ $roles->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>

@stop


@section('js')
    <script>
        function confirmDelete(event, roleId) {
            event.preventDefault();

            if (confirm('Êtes-vous sûr(e) de vouloir supprimer cet enregistrement?')) {
                document.getElementById('deleteForm'+roleId).submit();
            }
        }
    </script>
@stop

@extends('adminlte::page')

@section('title', 'afficher un role')

@section('content_header')
    <div class="header my-4 d-flex justify-content-between">
        <h4 class="">Afficher un Role</h4>
        <a href="/roles" class="d-block btn btn-success">Roles</a>
    </div>
@stop

@section('content')
    @include('components.messages_alert')

    <div class="bg-white p-5">
        <ul class="mb-5 border rounded py-5">
            <li class="mb-3"><span>Role : </span> {{$role->name}}</li>
            <li class="mb-3"><span>Permissions : </span>
                @if(!empty($rolePermissions))
                    @foreach($rolePermissions as $permission)
                        {{$permission->name}},
                    @endforeach
                @endif
            </li>
            <li class="mb-3"><span>Description : </span> {{$role->description}}</li>

        </ul>
        <a href="/roles/{{$role->id}}/edit" class="btn btn-warning">Modifier les information du role</a>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop



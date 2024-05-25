@extends('adminlte::page')

@section('title', 'afficher un permission')

@section('content_header')
    <div class="header my-4 d-flex justify-content-between">
        <h4 class="">Afficher un Permission</h4>
        <a href="/permissions" class="d-block btn btn-success">Permissions</a>
    </div>
@stop

@section('content')
    @include('components.messages_alert')

    <div class="bg-white p-5">
        <ul class="mb-5 border rounded py-5">
            <li class="mb-3"><span>Permission : </span> {{$permission->name}}</li>
            <li class="mb-3"><span>Description : </span> {{$permission->description}}</li>
        </ul>
        <a href="/permissions/{{$permission->id}}/edit" class="btn btn-warning">Modifier les information du permission</a>
    </div>

@stop

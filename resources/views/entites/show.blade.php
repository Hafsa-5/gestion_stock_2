@extends('adminlte::page')

@section('title', 'afficher un entité')

@section('content_header')
    <div class="header my-4 d-flex justify-content-between">
        <h4 class="">Afficher un Entité</h4>
        <a href="/entites" class="d-block btn btn-success">Entités</a>
    </div>
@stop

@section('content')
    @include('components.messages_alert')

    <div class="bg-white p-5">
        <ul class="mb-5 border rounded py-5">
            <li class="mb-3"><span>Nom : </span> {{$entite->nom}}</li>
            <li class="mb-3"><span>Adresse : </span> {{$entite->adresse}}</li>
            <li class="mb-3"><span>Phone : </span> {{$entite->phone}}</li>
        </ul>
        <a href="/entites/{{$entite->id}}/edit" class="btn btn-warning">Modifier les information du entite</a>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop



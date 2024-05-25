@extends('adminlte::page')

@section('title', 'Informations du compte')

@section('content_header')
    <div class="header my-4 d-flex justify-content-between">
        <h4 class="">Informations du compte</h4>
        <a href="/comptes" class="d-block btn btn-success">Comptes</a>
    </div>
@stop

@section('content')
    @include('components.messages_alert')
    <div class="bg-white p-5">
        <ul class="mb-5">
            <li><span>Nom : </span> {{$compte->agent->nom}}</li>
            <li><span>Prénom : </span> {{$compte->agent->prenom}}</li>
            <li><span>Adresse : </span> {{$compte->agent->adresse}}</li>
            <li><span>phone : </span> {{$compte->agent->phone}}</li>
            <li><span>Nom d'utilisateur : </span> {{$compte->username}}</li>
            <li><span>Email : </span> {{$compte->email}}</li>
            <li><span>Roles : </span> {{$compte->getRoleNames()}}</li>
        </ul>
        <a href="/comptes/{{$compte->id}}/edit" class="btn btn-warning">Modifier les information du compte</a>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop



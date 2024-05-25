@extends('adminlte::page')

@section('title', 'Informations de la demande')

@section('content_header')
    <div class="header my-4 d-flex justify-content-between">
        <h4 class="">Informations de la demande</h4>
        <a href="/demandes" class="d-block btn btn-success">Demandes</a>
    </div>
@stop

@section('content')
    @include('components.messages_alert')
    <div class="bg-white p-5">
        <ul class="mb-5">
            <li><span>Date de la demande : </span> {{$demande->date_demande}}</li>
            <li><span>Nom de l'agent : </span> {{$demande->agent->nom}}</li>
            <li><span>Prénom de l'agent : </span> {{$demande->agent->prenom}}</li>
            <li><span>phone de l'agent : </span> {{$demande->agent->phone}}</li>
            <li><span>Statut de la demande : </span> {{$demande->statut}}</li>
        </ul>
        <a href="/demandes/{{$demande->id}}/edit" class="btn btn-warning">Modifier les informations de la demande</a>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop



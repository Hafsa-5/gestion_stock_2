@extends('adminlte::page')

@section('title', 'afficher un contrat')

@section('content_header')
    <div class="header my-4 d-flex justify-content-between">
        <h4 class="">Afficher un Contrat</h4>
        <a href="/contrats" class="d-block btn btn-success">Contrats</a>
    </div>
@stop

@section('content')
    @include('components.messages_alert')

    <div class="bg-white p-5">
        <ul class="mb-5 border rounded py-5">
            <li class="mb-3"><span>Nom : </span> {{$contrat->nom}}</li>
            <li class="mb-3"><span>Adresse : </span> {{$contrat->adresse}}</li>
            <li class="mb-3"><span>Capacité : </span> {{$contrat->capacite}}</li>
            <li class="mb-3"><span>Fournisseur : </span> {{$contrat->fournisseur->nom}}</li>
        </ul>
        <a href="/contrats/{{$contrat->id}}/edit" class="btn btn-warning">Modifier les information du contrat</a>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop



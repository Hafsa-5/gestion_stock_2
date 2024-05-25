@extends('adminlte::page')

@section('title', 'Informations du fournisseur')

@section('content_header')
    <div class="header my-4 d-flex justify-content-between">
        <h4 class="">Informations du fournisseur</h4>
        <a href="/fournisseurs" class="d-block btn btn-success">Fournisseurs</a>
    </div>
@stop

@section('content')
    @include('components.messages_alert')
    <div class="bg-white p-5">
        <ul class="mb-5 border rounded py-5">
            <li class="mb-3"><span>Nom : </span> {{$fournisseur->nom}}</li>
            <li class="mb-3"><span>Adresse : </span> {{$fournisseur->adresse}}</li>
            <li class="mb-3"><span>Phone : </span> {{$fournisseur->phone}}</li>
            <li class="mb-3"><span>Email : </span> {{$fournisseur->email}}</li>
        </ul>
        <a href="/fournisseurs/{{$fournisseur->id}}/edit" class="btn btn-warning">Modifier les information du fournisseur</a>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop



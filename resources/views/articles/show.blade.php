@extends('adminlte::page')

@section('title', 'Informations de l\'article')

@section('content_header')
    <div class="header my-4 d-flex justify-content-between">
        <h4 class="">Informations de l'article</h4>
        <a href="/articles" class="d-block btn btn-success">Articles</a>
    </div>
@stop

@section('content')
    @include('components.messages_alert')
    <div class="bg-white p-5">
        <ul class="mb-5">
            <li><span>Nom : </span> {{$article->nom}}</li>
            <li><span>description : </span> {{$article->description}}</li>
            <li><span>Prix unitaire : </span> {{$article->prix_unitaire}}</li>
            <li><span>quantité en stock : </span> {{$article->quantite_stock}}</li>
            <li><span>fournisseur : </span> {{$article->contrat->fournisseur->nom}}</li>
            <li><span>date de demande : </span> {{$article->demande->date_demande}}</li>
            <li><span>demandeur : </span> {{$article->demande->agent->nom}} {{$article->demande->agent->prenom}}</li>
        </ul>
        <a href="/articles/{{$article->id}}/edit" class="btn btn-warning">Modifier les information de l'article</a>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop



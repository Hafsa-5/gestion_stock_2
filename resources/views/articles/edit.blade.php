@extends('adminlte::page')

@section('title', 'Modifier un article')

@section('content_header')
    <div class="header my-4 d-flex justify-content-between">
        <h4 class="">Modifier un article</h4>
        <a href="/articles" class="d-block btn btn-success">Articles</a>
    </div>
@stop

@section('content')
    @include('components.messages_alert')

    <div class="section_form">
        <div class="p-5 bg-white">
            <form action="/articles/{{$article->id}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="">

                    <div class="form-group mb-4">
                        <label class="mb-2" for="nom">Nom : </label>
                        <input name="nom" id="nom" type="text" class="form-control @error('nom') is-invalid @enderror" value="{{ old('nom', $article->nom) }}">
                        @error('nom')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="mb-2">Description:</label>
                        <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" style="height: 150px; resize:none;">{{ old('description', $article->description) }}</textarea>
                        @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label class="mb-2" for="prix_unitaire">Prix unitaire : </label>
                        <input name="text" id="prix_unitaire" type="text" class="form-control @error('prix_unitaire') is-invalid @enderror" value="{{ old('prix_unitaire', $article->prix_unitaire) }}">
                        @error('prix_unitaire')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label class="mb-2" for="quantite_stock">Quantité en stock : </label>
                        <input name="text" id="quantite_stock" type="text" class="form-control @error('quantite_stock') is-invalid @enderror" value="{{ old('quantite_stock', $article->quantite_stock) }}">
                        @error('quantite_stock')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label class="" for="contrat_id">Contrat : </label>
                        <select name="contrat_id" id="contrat_id" class="form-control @error('contrat_id') is-invalid @enderror">
                            <option value="">veuillez sélectionner le contrat</option>
                            @foreach($contrats as $contrat)
                                <option value="{{$contrat->id}}" @selected(old('contrat_id', $article->contrat_id) == $contrat->id)>{{$contrat->nom}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-4">
                        <label class="" for="demande_id">Demande : </label>
                        <select name="demande_id" id="demande_id" class="form-control @error('demande_id') is-invalid @enderror">
                            <option value="">veuillez sélectionner la demande</option>
                            @foreach($demandes as $demande)
                                <option value="{{$demande->id}}" @selected(old('demande_id', $article->demande_id) == $demande->id)>{{demande->agent->nom}} {{demande->agent->prenom}} {{$demande->date_demande}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="m-0 clearfix">
                        <input class="btn btn-primary float-right" type="submit" value="Modifier"/>
                    </div>
                </div>
            </form>
        </div>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

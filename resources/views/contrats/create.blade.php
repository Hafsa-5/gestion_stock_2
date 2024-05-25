@extends('adminlte::page')

@section('title', 'Ajouter un contrat')

@section('content_header')
    <div class="header my-4 d-flex justify-content-between">
        <h4 class="">Ajouter un nouvau contrat</h4>
        <a href="/contrats" class="d-block btn btn-success">Contrats</a>
    </div>
@stop

@section('content')
    @include('components.messages_alert')

    <div class="section_form">
        <div class="p-5 bg-white">
            <form action="/contrats" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="">
                    <div class="form-group mb-4">
                        <label class="mb-2" for="nom">Nom : </label>
                        <input name="nom" id="nom" type="text" class="form-control @error('nom') is-invalid @enderror" value="{{ old('nom') }}">
                        @error('nom')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-4">
                        <label class="mb-2" for="adresse">Adresse : </label>
                        <input name="adresse" id="adresse" type="text" class="form-control @error('adresse') is-invalid @enderror" value="{{ old('adresse') }}">
                        @error('adresse')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="mb-2" for="capacite">Capacité : </label>
                        <input name="capacite" id="capacite" type="text" class="form-control @error('capacite') is-invalid @enderror" value="{{ old('capacite') }}">
                        @error('capacite')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="" for="fournisseur_id">Fournisseur : </label>
                        <select name="fournisseur_id" id="fournisseur_id" class="form-control @error('fournisseur_id') is-invalid @enderror">
                            <option value="">veuillez sélectionner le fournisseur</option>
                            @foreach($fournisseurs as $fournisseur)
                                <option value="{{$fournisseur->id}}" @selected(old('fournisseur_id') == $fournisseur->id)>{{$fournisseur->nom}}</option>
                            @endforeach
                        </select>
                        @error('fournisseur_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="m-0 clearfix">
                        <input class="btn btn-primary float-right" type="submit" value="Ajouter"/>
                    </div>
                </div>
            </form>
        </div>
    </div>

@stop


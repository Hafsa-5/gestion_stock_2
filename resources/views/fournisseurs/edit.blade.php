@extends('adminlte::page')

@section('title', 'Modifier un fournisseur')

@section('content_header')
    <div class="header my-4 d-flex justify-content-between">
        <h4 class="">Modifier un fournisseur</h4>
        <a href="/fournisseurs" class="d-block btn btn-success">Fournisseurs</a>
    </div>
@stop

@section('content')
    @include('components.messages_alert')

    <div class="section_form">
        <div class="p-5 bg-white">
            <form action="/fournisseurs/{{$fournisseur->id}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="">
                    <div class="form-group mb-4">
                        <label class="mb-2" for="nom">Nom : </label>
                        <input name="nom" id="nom" type="text" class="form-control @error('nom') is-invalid @enderror" value="{{ old('nom', $fournisseur->nom) }}">
                        @error('nom')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-4">
                        <label class="mb-2" for="adresse">Adresse : </label>
                        <input name="adresse" id="adresse" type="text" class="form-control @error('adresse') is-invalid @enderror" value="{{ old('adresse', $fournisseur->adresse) }}">
                        @error('adresse')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="mb-2" for="phone">Phone : </label>
                        <input name="phone" id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone', $fournisseur->phone) }}">
                        @error('phone')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label class="mb-2" for="email">Email : </label>
                        <input name="email" id="email" type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $fournisseur->email) }}">
                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
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

@extends('adminlte::page')

@section('title', 'Modifier un demande')

@section('content_header')
    <div class="header my-4 d-flex justify-content-between">
        <h4 class="">Modifier un demande</h4>
        <a href="/demandes" class="d-block btn btn-success">Demandes</a>
    </div>
@stop

@section('content')
    @include('components.messages_alert')

    <div class="section_form">
        <div class="p-5 bg-white">
            <form action="/demandes/{{$demande->id}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="py-5">
                    <div class="form-group mb-4">
                        <label class="mb-2" for="date_demande">Date de Demande : </label>
                        <input name="date_demande" id="date_demande" type="date" class="form-control @error('date_demande') is-invalid @enderror" value="{{ old('date_demande', $date_demande_formattee) }}">
                        @error('date_demande')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label class="" for="statut">Statut : </label>
                        <select name="statut" id="statut" class="form-control @error('statut') is-invalid @enderror">
                            <option value="">veuillez sélectionner le statut</option>
                            @foreach($statuts as $statut)
                                <option value="{{$statut}}" @selected(old('statut', $demande->statut) == $statut)>{{$statut}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-4">
                        <label class="" for="agent_id">Agent : </label>
                        <select name="agent_id" id="agent_id" class="form-control @error('agent_id') is-invalid @enderror">
                            <option value="">veuillez sélectionner l'agent</option>
                            @foreach($agents as $agent)
                                <option value="{{$agent->id}}" @selected(old('agent_id', $demande->agent_id) == $agent->id)>{{$agent->nom}} {{$agent->prenom}}</option>
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

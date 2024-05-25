@extends('adminlte::page')

@section('title', 'Mon Profile')

@section('content_header')
    <div class="header my-4 d-flex justify-content-between">
        <h4 class="">MonProfile</h4>
    </div>
@stop

@section('content')
    @include('components.messages_alert')
    <div class="bg-white p-5">
        <ul class="mb-5">
            <li><span>Nom : </span> {{$compte->nom}}</li>
            <li><span>Prénom : </span> {{$compte->prenom}}</li>
            <li><span>phone : </span> {{$compte->phone}}</li>
            <li><span>Email : </span> {{$compte->email}}</li>
            <li><span>Roles : </span> {{$compte->getRoleNames()->first()}}</li>
        </ul>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop



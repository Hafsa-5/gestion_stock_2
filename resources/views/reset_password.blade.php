@extends('adminlte::page')

@section('title', 'Changer le Mot de passe')

@section('content_header')
    <div class="header my-4 d-flex justify-content-between">
        <h4 class="">Changer votre mot de passe</h4>
    </div>
@stop

@section('content')
    @include('components.messages_alert')
    <div class="section_form">
        <div class="p-5 bg-white">
            <form action="{{ route('reset_password_post') }}" method="post">
                @csrf
                <div class="">

                    <div class="form-group mb-4">
                        <label class="mb-2" for="old_password">Ancien Mot de passe : </label>
                        <input name="old_password" id="old_password" type="password" class="form-control @error('old_password') is-invalid @enderror" value="{{ old('old_password') }}">
                        @error('old_password')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label class="mb-2" for="new_password">Nouveau Mot de passe : </label>
                        <input name="new_password" id="new_password" type="password" class="form-control @error('new_password') is-invalid @enderror" value="{{ old('new_password') }}">
                        @error('new_password')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label class="mb-2" for="confirm_new_password">Confirmer le Nouveau Mot de passe : </label>
                        <input name="confirm_new_password" id="confirm_new_password" type="password" class="form-control @error('confirm_new_password') is-invalid @enderror" value="{{ old('confirm_new_password') }}">
                        @error('confirm_new_password')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="m-0 clearfix">
                        <input class="btn btn-primary float-right" type="submit" value="Changer"/>
                    </div>
                </div>
            </form>
        </div>
    </div>

@stop




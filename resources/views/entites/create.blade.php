@extends('adminlte::page')

@section('title', 'Ajouter une entité')

@section('content_header')
    <div class="header my-4 d-flex justify-content-between">
        <h4 class="">Ajouter une nouvelle entité</h4>
        <a href="/entites" class="d-block btn btn-success">Entités</a>
    </div>
@stop

@section('content')
    @include('components.messages_alert')

    <div class="section_form">
        <div class="p-5 bg-white">
            <form action="/entites" method="POST" enctype="multipart/form-data">
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

                    <div class="row mb-4">
                        <div class="form-group col-6">
                            <label class="mb-2" for="phone">Phone : </label>
                            <input name="phone" id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}">
                            @error('phone')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="m-0 clearfix">
                        <input class="btn btn-primary float-right" type="submit" value="Ajouter"/>
                    </div>
                </div>
            </form>
        </div>
    </div>

@stop

@section('js')
    <script>
        $(document).ready(function() {
            var selectedVilleId = '{{ old('ville_id') }}';
            var selectedImmeubleId = '{{ old('immeuble_id') }}';

            $.ajax({
                url: '/immeubles/get-immeubles',
                type: 'GET',
                data: { ville_id: selectedVilleId },
                success: function(response) {
                    $('#immeuble_id').empty();

                    $('#immeuble_id').append($('<option value="">veuillez sélectionner l\'immeuble</option>'));
                    $.each(response.immeubles, function(key, immeuble) {
                        var option = $('<option></option>').val(immeuble.id).text(immeuble.nom);
                        if (immeuble.id == selectedImmeubleId) {
                            option.attr('selected', 'selected');
                        }
                        $('#immeuble_id').append(option);
                    });
                },
                error: function(xhr) {
                }
            });

        });

        $(document).ready(function() {
            $('#ville_id').change(function() {
                var villeId = $(this).val();

                $.ajax({
                    url: '/immeubles/get-immeubles',
                    type: 'GET',
                    data: { ville_id: villeId },
                    success: function(response) {
                        $('#immeuble_id').empty();

                        $('#immeuble_id').append($('<option value="">veuillez sélectionner l\'immeuble</option>'));
                        $.each(response.immeubles, function(key, immeuble) {
                            $('#immeuble_id').append($('<option></option>').val(immeuble.id).text(immeuble.nom));
                        });
                    },
                    error: function(xhr) {
                    }
                });
            });
        });
    </script>
@stop


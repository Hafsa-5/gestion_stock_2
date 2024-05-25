@extends('adminlte::page')

@section('title', 'Modifier un permission')

@section('content_header')
    <div class="header my-4 d-flex justify-content-between">
        <h4 class="">Modifier une Permission</h4>
        <a href="/permissions" class="d-block btn btn-success">Permissions</a>
    </div>
@stop

@section('content')
    @include('components.messages_alert')

    <div class="section_form">
        <div class="p-5 bg-white">
            <form action="/permissions/{{$permission->id}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="">

                    <div class="form-group mb-4">
                        <label class="mb-2" for="name">Permission : </label>
                        <input name="name" id="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $permission->name) }}">
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="mb-2">Description:</label>
                        <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" style="height: 150px; resize:none;">{{ old('description', $permission->description) }}</textarea>
                    </div>

                    <div class="m-0 clearfix">
                        <input class="btn btn-primary float-right" type="submit" value="Modifier"/>
                    </div>
                </div>
            </form>
        </div>
    </div>

@stop




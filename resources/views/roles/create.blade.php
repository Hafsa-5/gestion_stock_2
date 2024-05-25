@extends('adminlte::page')

@section('title', 'Ajouter un role')

@section('content_header')
    <div class="header my-4 d-flex justify-content-between">
        <h4 class="">Ajouter un nouvau Role</h4>
        <a href="/roles" class="d-block btn btn-success">Roles</a>
    </div>
@stop

@section('content')
    @include('components.messages_alert')

    <div class="section_form">
        <div class="p-5 bg-white">
            <form action="/roles" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="">

                    <div class="form-group mb-4">
                        <label class="mb-2" for="name">Role : </label>
                        <input name="name" id="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label class="mb-2">Permissions:</label>
                        <div class="border rounded p-3">
                            @foreach($permissions as $permission)
                                <label class="mr-4"><input type="checkbox" name="permission[]" id="permissions" value={{$permission->id}}> {{$permission->name}}</label>
                            @endforeach
                        </div>
                        @error('permission')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="mb-2">Description:</label>
                        <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" style="height: 150px; resize:none;">{{ old('description') }}</textarea>
                        @error('description')
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

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop



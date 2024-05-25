@extends('adminlte::page')

@section('title', 'Modifier un role')

@section('content_header')
    <div class="header my-4 d-flex justify-content-between">
        <h4 class="">Modifier un Role</h4>
        <a href="/roles" class="d-block btn btn-success">Roles</a>
    </div>
@stop

@section('content')
    @include('components.messages_alert')

    <div class="section_form">
        <div class="p-5 bg-white">
            <form action="/roles/{{$role->id}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="">

                    <div class="form-group mb-4">
                        <label class="mb-2" for="name">Role : </label>
                        <input name="name" id="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('role', $role->name) }}">
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label class="mb-2">Permissions:</label>
                        <div class="border rounded p-3">
                            @foreach($permissions as $permission)
                                <label class="mr-4"><input type="checkbox" name="permission[]" value="{{ $permission->id }}" {{ in_array($permission->id, $rolePermissions) ? 'checked' : '' }}> {{$permission->name}}</label>
                            @endforeach
                        </div>
                        @error('permission')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="mb-2">Description:</label>
                        <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" style="height: 150px; resize:none;">{{ old('description', $role->description) }}</textarea>
                        @error('description')
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



{{--}}
@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Role</h2>
            </div>
            <div class="pull-right">
                <a href="{{route('roles.index')}}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>

    @if(count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There sere some problems with your input.<br><br>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {!! Form::model($role, ['method' => 'PATCH', 'route' => ['roles.update', $role->id]]) !!}
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {!! Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control']) !!}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Permissions:</strong><br/>
                @foreach($permission as $value)
                    <label>{{Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions)? true : false, ['class' => 'name'])}} {{$value->name}}</label><br>
                @endforeach
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
    {!! Form::close() !!}
    <p class="text-center text-primary"><smapp>tutorial test</smapp></p>
@endsection
{{--}}

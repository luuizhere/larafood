@extends('adminlte::page')

@section('title', "Editar Perfil {$perfil->name}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a  href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a  href="{{ route('profiles.index') }}">Perfis</a></li>
        <li class="breadcrumb-item active"><a  href="{{ route('profiles.create') }}" class="active">Editar Perfil {{$perfil->name}}</a></li>
    </ol>
    <h1> Editar Perfil {{ $perfil->name }}</h1>

@stop

@section('content')
    
    <div class="card">

        <div class="card-body">
            <form action="{{ route('profiles.update',$perfil->id) }}" method="post">
                @method('PUT')
                @include('admin.pages.profiles._partials.form')
            </form>
        </div>

    </div>
@endSection
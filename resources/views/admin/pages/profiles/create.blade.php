@extends('adminlte::page')

@section('title', "Adicionar novo Perfil")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a  href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a  href="{{ route('profiles.index') }}">Perfis</a></li>
        <li class="breadcrumb-item active"><a  href="{{ route('profiles.create') }}" class="active">Novo Perfil</a></li>
    </ol>
    <h1> Adicionar novo Perfil</h1>

@stop

@section('content')
    
    <div class="card">

        <div class="card-body">
            <form action="{{ route('profiles.store') }}" method="post">
                @include('admin.pages.profiles._partials.form')
            </form>
        </div>

    </div>
@endSection
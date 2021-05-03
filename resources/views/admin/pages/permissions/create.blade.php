@extends('adminlte::page')

@section('title', "Adicionar nova Permissão")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a  href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a  href="{{ route('permissions.index') }}">Perfis</a></li>
        <li class="breadcrumb-item active"><a  href="{{ route('permissions.create') }}" class="active">Nova Permissão</a></li>
    </ol>
    <h1> Adicionar novo Permissão</h1>

@stop

@section('content')
    
    <div class="card">

        <div class="card-body">
            <form action="{{ route('permissions.store') }}" method="post">
                @include('admin.pages.permissions._partials.form')
            </form>
        </div>

    </div>
@endSection
@extends('adminlte::page')

@section('title', "Detalhe do Perfil {$perfil->name}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a  href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a  href="{{ route('profiles.index') }}">Perfis</a></li>
        <li class="breadcrumb-item active"><a  href="{{ route('profiles.create') }}" class="active">Ver Perfil {{$perfil->name}}</a></li>
    </ol>
    <h1> Detalhe do Perfil {{ $perfil->name }}</h1>

@stop

@section('content')
    
    <div class="card">

        <div class="card-body">
            <form action="{{ route('profiles.update',$perfil->id) }}" method="post">
              <ul>
                  <li>
                      <strong>Nome:</strong> {{$perfil->name}}
                  </li>
              </ul>
            </form>
        </div>
        <div class="card-footer">
            <form action="{{ route('profiles.destroy',$perfil->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Deletar o {{ $perfil->name }}</button>
            </form>
        </div>
    </div>
@endSection
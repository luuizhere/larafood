@extends('adminlte::page')

@section('title', "Detalhe da Permissão {$permission->name}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a  href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a  href="{{ route('permissions.index') }}">Perfis</a></li>
        <li class="breadcrumb-item active"><a  href="{{ route('permissions.create') }}" class="active">Ver Permissão {{$permission->name}}</a></li>
    </ol>
    <h1> Detalhe da Permissão {{ $permission->name }}</h1>

@stop

@section('content')
    
    <div class="card">

        <div class="card-body">
            <form action="{{ route('permissions.update',$permission->id) }}" method="post">
              <ul>
                  <li>
                      <strong>Nome:</strong> {{$permission->name}}
                  </li>
              </ul>
            </form>
        </div>
        <div class="card-footer">
            <form action="{{ route('permissions.destroy',$permission->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Deletar o {{ $permission->name }}</button>
            </form>
        </div>
    </div>
@endSection
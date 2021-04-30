@extends('adminlte::page')

@section('title', 'Perfis')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a  href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a  href="{{ route('profiles.index') }}" class="active">Perfis</a></li>
    </ol>
    <h1>Perfis <a href="{{ route('profiles.create') }}" class="btn btn-dark"><i class="fas fa-plus-square"></i></a> </h1>

@stop

@section('content')
    
    <div class="card">
        <div class="card-header">
            <form action="{{ route('plans.search') }}" method="POST" class="form form-inline">
                @CSRF
                <input type="text" name="filter" placeholder="Nome" class="form-control" value=" {{ $filters['filter'] ?? '' }}">
                <button type="submit" class="btn btn-dark">Filtrar</button>
            </form>
        </div>
        <div class="card-body">
            @include('admin.includes.alerts')
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($profiles as $profile)
                        <tr>
                            <td>
                                {{$profile->name}}
                            </td>
                            <td width="250">
                                {{-- <a href=" {{ route('details.plan.index', $profile->id) }}" class="btn btn-primary">Detalhes</a> --}}
                                <a href=" {{ route('profiles.edit', $profile->id) }}" class="btn btn-info">Edit</a>
                                <a href=" {{ route('profiles.show',$profile->id) }}" class="btn btn-warning">Ver</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $profiles->appends($filters)->links() !!}
            @else
                {!! $profiles->links() !!}
            @endif

           
        </div>
    </div>
@stop

@extends('adminlte::page')

@section('title', 'Permissão')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a  href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a  href="{{ route('permissions.index') }}" class="active">Permissão</a></li>
    </ol>
    <h1>Permissão <a href="{{ route('permissions.create') }}" class="btn btn-dark"><i class="fas fa-plus-square"></i></a> </h1>

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
                        <th>Descrição</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($permissions as $permission)
                        <tr>
                            <td>
                                {{$permission->name}}
                            </td>
                            <td>
                                {{$permission->description}}
                            </td>
                            <td width="250">
                                {{-- <a href=" {{ route('details.plan.index', $permission->id) }}" class="btn btn-primary">Detalhes</a> --}}
                                <a href=" {{ route('permissions.edit', $permission->id) }}" class="btn btn-info">Edit</a>
                                <a href=" {{ route('permissions.show',$permission->id) }}" class="btn btn-warning">Ver</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $permissions->appends($filters)->links() !!}
            @else
                {!! $permissions->links() !!}
            @endif

           
        </div>
    </div>
@stop

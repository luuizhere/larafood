@extends('adminlte::page')

@section('title', "Detalhes do Planos {$plan->name}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a  href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a  href="{{ route('plans.index') }}" >Planos</a></li>
        <li class="breadcrumb-item"><a  href="{{ route('plans.show',$plan->url) }}" >{{$plan->name}}</a></li>
        <li class="breadcrumb-item active"><a  href="{{ route('details.plan.index',$plan->url) }}" class="active">Detalhes do Planos</a></li>
    </ol>
    <h1>Detalhes Planos {{$plan->name}} <a href="{{ route('plans.create') }}" class="btn btn-dark"><i class="fas fa-plus-square"></i></a> </h1>

@stop

@section('content')
    
    <div class="card">

        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($details as $detail)
                        <tr>
                            <td>
                                {{$detail->name}}
                            </td>
                            <td width="150">
                                <a href=" {{ route('plan.edit', $plan->url) }}" class="btn btn-primary">Edit</a>
                                <a href=" {{ route('plans.show',$plan->url) }}" class="btn btn-warning">VER</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $details->appends($filters)->links() !!}
            @else
                {!! $details->links() !!}
            @endif

           
        </div>
    </div>
@stop
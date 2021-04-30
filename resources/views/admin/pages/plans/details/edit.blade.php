@extends('adminlte::page')

@section('title', "Editar Detalhe do plano {$plan->name}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a  href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a  href="{{ route('plans.index') }}" >Planos</a></li>
        <li class="breadcrumb-item"><a  href="{{ route('plans.show',$plan->url) }}" >{{$plan->name}}</a></li>
        <li class="breadcrumb-item"><a  href="{{ route('details.plan.index',$plan->url) }}">Detalhes do Planos</a></li>
        <li class="breadcrumb-item active"><a  href="{{ route('details.plan.create',[$plan->url, $detail->id]) }}" class="active">Editar Detalhe</a></li>
    </ol>
    <h1> Editar Detalhe do plano {{ $plan->name }}</h1>

@stop

@section('content')
    
    <div class="card">

        <div class="card-body">
            <form action="{{ route('details.plan.update',[$plan->url,$detail->id]) }}" method="post">
                @method('PUT')
                @include('admin.pages.plans.details._partials.form')
            </form>
        </div>

    </div>
@endSection
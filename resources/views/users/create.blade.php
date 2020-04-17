@extends('adminlte::page')

@section('content') 
<section class="wrapper">
    <h3>
        <i class="fa fa-angle-right"></i> Crear Usuarios
        @can('users.index')
        <a href="{{ route('users.index') }}" 
        class="btn btn-sm btn-primary pull-right">
            Lista Usuarios
        </a>
        @endcan
    </h3>
    <div class="panel-body">                    
        {{ Form::open(['route' => 'users.store']) }}

            @include('users.partials.form')
            
        {!! Form::close() !!}
    </div>
</section>
@endsection
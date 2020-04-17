@extends('adminlte::page')

@section('content') 
<section class="wrapper">
    <h3>
        <i class="fa fa-angle-right"></i> Crear Roles
        @can('roles.index')
        <a href="{{ route('roles.index') }}" 
        class="btn btn-sm btn-primary pull-right">
            Lista Roles
        </a>
        @endcan
    </h3>
    <div class="panel-body">                    
        {{ Form::open(['route' => 'roles.store']) }}

            @include('roles.partials.form')
            
        {{ Form::close() }}
    </div>
</section>
@endsection
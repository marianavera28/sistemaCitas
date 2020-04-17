@extends('adminlte::page')

@section('content') 
<section class="wrapper">
    <h3>
        <i class="fa fa-angle-right"></i> Ver Rol
        @can('roles.index')
        <a href="{{ route('roles.index') }}" 
        class="btn btn-sm btn-primary pull-right">
            Lista Roles
        </a>
        @endcan
    </h3>
    <div class="panel panel-default">
        <div class="panel-body">                                        
            <p><strong>Nombre</strong>     {{ $role->name }}</p>
            <p><strong>Slug</strong>       {{ $role->slug }}</p>
            <p><strong>Descripción</strong>  {{ $role->description }}</p>
        </div>
    </div>
</section>
@endsection
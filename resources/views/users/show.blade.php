@extends('adminlte::page')

@section('content') 
<section class="wrapper">
    <h3>
        <i class="fa fa-angle-right"></i> Ver Usuario
        @can('users.index')
        <a href="{{ route('users.index') }}" 
        class="btn btn-sm btn-primary pull-right">
            Lista Usuarios
        </a>
        @endcan
    </h3>
    <div class="panel panel-default">
        <div class="panel-body">                                        
            <p><strong>Nombre</strong>     {{ $user->name }}</p>
            <p><strong>Email</strong>      {{ $user->email }}</p>
        </div>
    </div>
</section>
@endsection
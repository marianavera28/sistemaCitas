@extends('adminlte::page')

@section('content') 

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark"><i class="fas fa-fw fa-user-tie"></i>Editar Rol</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="admin">Tablero</a></li>
            @can('roles.index')
                <li class="breadcrumb-item"><a href="{{ route('roles.index') }}">Lista de Roles</a></li>
            @endcan
            <li class="breadcrumb-item active">Rol #{{ $role->id }}</li>
          </ol>
        </div><!-- /.col -->

        @if (session('info'))
            <div class="alert alert-success">
                {{ session('info') }}
            </div>
        @endif
    </div><!-- /.row -->
@stop

<section class="wrapper">
    <div class="panel-body">                    
        {!! Form::model($role, ['route' => ['roles.update', $role->id],
        'method' => 'PUT']) !!}

            @include('roles.partials.form')
            
        {!! Form::close() !!}
    </div>
</section>
@endsection
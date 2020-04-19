@extends('adminlte::page')

@section('content') 

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark"><i class="fas fa-fw fa-users"></i>Crear Usuario</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="admin">Tablero</a></li>
            @can('users.index')
                <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Lista de Usuarios</a></li>
            @endcan
            <li class="breadcrumb-item active">Crear Usuario</li>
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
        {{ Form::open(['route' => 'users.store']) }}

            @include('users.partials.form')
            
        {!! Form::close() !!}
    </div>
</section>
@endsection
@extends('adminlte::page')

@section('content') 
<section class="wrapper">
    <h3>
        <i class="fa fa-angle-right"></i> Editar Usuarios
        @can('users.index')
        <a href="{{ route('users.index') }}" 
        class="btn btn-sm btn-primary pull-right">
            Lista Usuarios
        </a>
        @endcan
    </h3>
    <div class="panel-body">                    
        {!! Form::model($user, ['route' => ['users.update', $user->id],
        'method' => 'PUT']) !!}

            @include('users.partials.form')
            
        {!! Form::close() !!}
    </div>
</section>
@endsection
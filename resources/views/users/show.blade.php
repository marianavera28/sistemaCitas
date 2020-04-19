@extends('adminlte::page')

@section('content') 

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark"><i class="fas fa-fw fa-users"></i> Ver Usuario</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="admin">Tablero</a></li>
            @can('users.index')
                <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Lista de Usuarios</a></li>
            @endcan
            <li class="breadcrumb-item active">Usuario #{{ $user->id }}</li>
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
    <div class="panel panel-default">
        <div class="panel-body">   
            <table id="users" class="table table-striped table-bordered dt-responsive nowrap" width="100%">
                <tbody>     
                    <tr>                               
                        <td width="30px"><strong>Nombre: </strong></td><td>{{ $user->name }}</td>
                    </tr>
                    <tr> 
                        <td width="30px"><strong>Email: </strong></td><td>{{ $user->email }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection
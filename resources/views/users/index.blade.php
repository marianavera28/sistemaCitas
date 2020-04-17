@extends('adminlte::page')

@section('content') 
<section class="wrapper">
    <h3>
        <i class="fa fa-angle-right"></i> Usuarios 
        @can('users.create')
        <a href="{{ route('users.create') }}" 
        class="btn btn-sm btn-primary pull-right">
            Crear Usuarios
        </a>
        @endcan
    </h3>
    <div class="adv-table">
        <table id="products" class="table table-bordered dt-responsive nowrap content-panel" style="width:100%">
            <thead>
                <tr>
                    <th width="10px">ID</th>
                    <th>Nombre</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    @can('users.show')
                    <td width="10px">
                        <a href="{{ route('users.show', $user->id) }}" 
                        class="btn btn-sm btn-default">
                            ver
                        </a>
                    </td>
                    @endcan
                    @can('users.edit')
                    <td width="10px">
                        <a href="{{ route('users.edit', $user->id) }}" 
                        class="btn btn-sm btn-default">
                            editar
                        </a>
                    </td>
                    @endcan
                    @can('users.destroy')
                    <td width="10px">
                        {!! Form::open(['route' => ['users.destroy', $user->id], 
                        'method' => 'DELETE']) !!}
                            <button class="btn btn-sm btn-danger">
                                Eliminar
                            </button>
                        {!! Form::close() !!}
                    </td>
                    @endcan
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
@endsection



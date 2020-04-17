@extends('adminlte::page')

@section('content') 
<section class="wrapper">
    <h3>
        <i class="fa fa-angle-right"></i> Roles 
        @can('roles.create')
        <a href="{{ route('roles.create') }}" 
        class="btn btn-sm btn-primary pull-right">
            Crear Roles
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
                @foreach($roles as $role)
                <tr>
                    <td>{{ $role->id }}</td>
                    <td>{{ $role->name }}</td>
                    @can('roles.show')
                    <td width="10px">
                        <a href="{{ route('roles.show', $role->id) }}" 
                        class="btn btn-sm btn-default">
                            ver
                        </a>
                    </td>
                    @endcan
                    @can('roles.edit')
                    <td width="10px">
                        <a href="{{ route('roles.edit', $role->id) }}" 
                        class="btn btn-sm btn-default">
                            editar
                        </a>
                    </td>
                    @endcan
                    @can('roles.destroy')
                    <td width="10px">
                        {!! Form::open(['route' => ['roles.destroy', $role->id], 
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



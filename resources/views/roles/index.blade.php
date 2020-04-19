@extends('adminlte::page')

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark"><i class="fas fa-fw fa-user-tie"></i>Roles</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="admin">Tablero</a></li>
            <li class="breadcrumb-item active">Roles</li>
          </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
@stop

@section('content') 
    <section class="wrapper">
        <div class="adv-table">
            <table id="tables" class="table table-striped table-bordered dt-responsive nowrap" width="100%">
                <thead>
                    <tr>
                        <th align="center" width="20">ID</th>
                        <th align="center">Nombre</th>
                        @can('users.show')
                            <th align="center"></th>
                        @endcan
                        @can('users.edit')
                            <th align="center"></th>
                        @endcan
                        @can('users.destroy')
                            <th align="center"></th>
                        @endcan
                    </tr>
                </thead>
                <tbody>
                    @foreach($roles as $rol)
                    <tr>
                        <td>{{ $rol->id }}</td>
                        <td>{{ $rol->name }}</td>
                        @can('roles.show')
                        <td width="10px" align="center">
                            <a href="{{ route('roles.show', $rol->id) }}" 
                            class="btn btn-sm btn-default" data-toggle="tooltip" title="Ver">
                                <i class="fas fa-fw fa-eye"></i>
                            </a>
                        </td>
                        @endcan
                        @can('roles.edit')
                        <td width="10px" align="center">
                            <a href="{{ route('roles.edit', $rol->id) }}" 
                            class="btn btn-sm btn-success" data-toggle="tooltip" title="Editar">
                                <i class="fas fa-fw fa-edit"></i>
                            </a>
                        </td>
                        @endcan
                        @can('roles.destroy')
                        <td width="10px" align="center">
                            {!! Form::open(['route' => ['roles.destroy', $rol->id], 
                            'method' => 'DELETE']) !!}
                                @if(in_array($rol->name,$rolesPrincipales))
                                    <button class="btn btn-sm btn-danger" disabled="true">
                                        <i class="fas fa-fw fa-trash-alt"></i>
                                    </button>
                                @else
                                    <button class="btn btn-sm btn-danger">
                                        <i class="fas fa-fw fa-trash-alt"></i>
                                    </button>
                                @endif
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

@section('js')
    <script src="dist/plugins/sweetalert2/sweetalert2.min.js"></script>
    <script src="dist/plugins/toastr/toastr.min.js"></script>

    @if(session('info'))
        <script type="text/javascript">

            const success = @json(session('info'));
            const Toast = Swal.mixin({
              toast: true,
              position: 'top-end',
              showConfirmButton: false,
              timer: 3000
            });

            Toast.fire({
                icon: 'success',
                title: success
            });
        </script>
    @endif

    @if(session('warning'))
        <script type="text/javascript">

            const warning = @json(session('warning'));
            const Toast = Swal.mixin({
              toast: true,
              position: 'top-end',
              showConfirmButton: false,
              timer: 3000
            });

            Toast.fire({
                icon: 'warning',
                title: warning
            });
        </script>
    @endif

    <script type="text/javascript" src="dist/js/datatables.js"></script>
@stop

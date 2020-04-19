@extends('adminlte::page')

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark"><i class="fa fa-users"></i> Usuarios</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="admin">Tablero</a></li>
            <li class="breadcrumb-item active">Usuarios</li>
          </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
@stop

@section('content') 
    <section class="wrapper">
        <div class="adv-table">
            <table id="tables" class="table table-hover table-bordered table-striped text-nowrap">
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
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        @can('users.show')
                        <td width="10px">
                            <a href="{{ route('users.show', $user->id) }}" 
                            class="btn btn-sm btn-default">
                                <i class="fas fa-fw fa-eye"></i>
                            </a>
                        </td>
                        @endcan
                        @can('users.edit')
                        <td width="10px">
                            <a href="{{ route('users.edit', $user->id) }}" 
                            class="btn btn-sm btn-success">
                                <i class="fas fa-fw fa-edit"></i>
                            </a>
                        </td>
                        @endcan
                        @can('users.destroy')
                        <td width="10px">

                            {!! Form::open(['route' => ['users.destroy', $user->id], 
                            'method' => 'DELETE']) !!}
                                @if(in_array($user->name,$rolesPrincipales))
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


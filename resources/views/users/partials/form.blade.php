<?php 
	use Illuminate\Support\Facades\Route;
	$ruta = Route::currentRouteName();
?>

<div class="form-group">
	{{ Form::label('name', 'Nombre de la etiqueta') }}
	{{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) }}
</div>

@if($ruta == 'users.create')
	<div class="form-group">
		{{ Form::label('email', 'Correo') }}
		{{ Form::email('email', '', ['class' => 'form-control', 'id' => 'email', 'placeholder'=>'nombre@dominio.com']) }}
	</div>
	<div class="form-group">
		{{ Form::label('password', 'Clave') }}
		{{ Form::password('password', ['class' => 'form-control', 'placeholder'=>'8 caracteres mínimo']) }}
	</div>
@endif
<hr>
<h3>Lista de roles</h3>
<div class="form-group">
	<ul class="list-unstyled">
		@foreach($roles as $role)
	    <li>
	        <label>
	        {{ Form::checkbox('roles[]', $role->id, null) }}
	        {{ $role->name }}
	        <em>({{ $role->description ?: 'N/A'}})</em>
	        </label>
	    </li>
	    @endforeach
    </ul>
</div>
<div class="form-group">
	{{ Form::button('<i class="far fa-save"></i> Guardar', ['type' => 'submit', 'class' => 'btn btn-sm btn-primary'] )  }}
</div>
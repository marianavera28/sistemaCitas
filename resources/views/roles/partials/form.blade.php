@if($disabled)
	<div class="form-group">
		{{ Form::label('name', 'Nombre de la etiqueta') }}
		{{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name', 'disabled' => 'disabled']) }}
	</div>
@else
	<div class="form-group">
		{{ Form::label('name', 'Nombre de la etiqueta') }}
		{{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) }}
	</div>
@endif

<div class="form-group">
	{{ Form::label('slug', 'URL Amigable') }}
	{{ Form::text('slug', null, ['class' => 'form-control', 'id' => 'slug']) }}
</div>
<div class="form-group">
	{{ Form::label('description', 'Descripción') }}
	{{ Form::textarea('description', null, ['class' => 'form-control', 'rows'=>'3']) }}
</div>
<hr>
<h3>Permiso especial</h3>
<div class="form-group">
 	<label>{{ Form::radio('special', 'all-access', ['class' => 'minimal']) }} Acceso total</label>
 	<label>{{ Form::radio('special', 'no-access') }} Bloquear acceso</label>
 	<label>{{ Form::radio('special', '') }} Sin efecto</label>
</div>

<hr>
<h3>Lista de permisos</h3>
<div class="form-group">
	<ul class="list-unstyled">
		@foreach($permissions as $permission)
	    <li>
	        <label>
	        {{ Form::checkbox('permissions[]', $permission->id, null) }}
	        {{ $permission->name }}
	        <em>({{ $permission->description }})</em>
	        </label>
	    </li>
	    @endforeach
    </ul>
</div>
<div class="form-group">
	{{ Form::button('<i class="far fa-save"></i> Guardar', ['type' => 'submit', 'class' => 'btn btn-sm btn-primary'] )  }}
</div>

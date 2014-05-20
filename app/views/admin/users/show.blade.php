@extends ('admin/layout')

@section ('title') Detalles de Usuarios @stop

@section ('content')

 

<h1>Usuario # {{$user->id}}</h1>

<p><h3>
	Nombre comprelo : {{$user->full_name}}
	<br>

	Email   : {{ $user->email}}
</p>
</h3>
        
   <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-primary">
     Editar</a>
          <a
     {{ Form::model($user, array('route' => array('admin.users.destroy', $user->id), 'method' => 'DELETE', 'role' => 'form')) }}
  <div class="row">
  <div class="form-group col-md-4">
        {{ Form::submit('Eliminar usuario', array('class' => 'btn btn-danger')) }}
    </div>
  </div>
{{ Form::close() }}
</a>
   <a href="{{ route('admin.users.store') }}" class="btn btn-primary">
         Regresar</a>

@stop

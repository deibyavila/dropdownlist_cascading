@extends ('admin/layout')

@section ('title') Lista de Usuarios @stop

@section ('content')





<h1>Lista de usuarios</h1>
 {{--llamar mensaje de alerta del controlador--}}
  {{ Alert::render() }}

<p>
 <a href="{{ route('admin.users.create') }}" class="btn btn-primary">Crear un nuevo usuario </a>
 </p>

  <table class="table table-striped" style="width: 900px">
    <tr>
        <th>Nombre completo</th>
        <th>Correo electr&oacute;nico</th>
        <th>Perfil</th>
        <th>Acciones</th>
    </tr>
    @foreach ($users as $user)
    <tr>
        <td>{{ $user->full_name }}</td>
         <td>{{ $user->email }}</td>
        <td>{{$user->profile}}</td>
       
        <td>
          <a href="{{ route('admin.users.show', $user->id) }}" class="btn btn-info">
              Ver
          </a>
          <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-primary">
            Editar
          </a>
          <a href="#" data-id="{{ $user->id }}" class="btn btn-danger btn-delete">
              Eliminar
          </a>
        </td>
    </tr>
    @endforeach
  </table>


  {{ $users->links() }}


  
{{--llamar funcion js para borrar--}}
  {{ Form::open(array('route' => array('admin.users.destroy', 'USER_ID'), 'method' => 'DELETE', 'role' => 'form', 'id' => 'form-delete')) }}
{{ Form::close() }}


@stop
@extends ('comercial/layout')

@section ('title') Lista de cotizaciones @stop

@section ('content')





<h1>Lista de cotizaciones</h1>
 {{--llamar mensaje de alerta del controlador--}}
  {{ Alert::render() }}

<p>
 <a href="{{ route('comercial.ventas.create') }}" class="btn btn-primary">Crear cotizacion </a>
 </p>

  <table class="table table-striped" style="width: 900px">
    <tr>
        <th>Nombre completo</th>
        <th>Correo electr&oacute;nico</th>
        <th>Acciones</th>
    </tr>
    @foreach ($ventas as $venta)
    <tr>
      <td>{{$venta->id}}</td>
        <td>{{ $venta->full_name }}</td>
         <td>{{ $venta->email }}</td>
        
       
        <td>
          <a href="{{ route('comercial.ventas.show', $venta->id) }}" class="btn btn-info">
              Ver
          </a>
          <a href="{{ route('comercial.ventas.edit', $venta->id) }}" class="btn btn-primary">
            Editar
          </a>
             
        </td>
    </tr>
    @endforeach
  </table>


  {{ $ventas->links() }}


  



@stop
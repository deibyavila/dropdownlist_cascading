@extends ('comercial/layout')

@section ('title') Detalles de cotizacion @stop

@section ('content')

 

<h1>Cotizacion  # {{$venta->id}}</h1>

<p><h3>
	Nombre comprelo : {{$venta->full_name}}
	<br>

	Email   : {{ $venta->email}}
</p>
</h3>
        
   <a href="{{ route('comercial.ventas.edit', $venta->id) }}" class="btn btn-primary">Editar</a>
          
{{ Form::close() }}
</a>
   <a href="{{ route('comercial.ventas.store') }}" class="btn btn-primary">Regresar</a>

@stop

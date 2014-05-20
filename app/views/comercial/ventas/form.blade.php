@extends ('comercial/layout')

@section ('head')

@stop


<?php

    if ($venta->exists):
        $form_data = array('route' => array('comercial.ventas.update', $venta->id), 'method' => 'PATCH');
        $action    = 'Editar';
    else:
        $form_data = array('route' => 'comercial.ventas.store', 'method' => 'POST');
        $action    = 'Crear';        
    endif;

?>

@section ('title') {{ $action }} Cotizacion @stop

@section ('content')

  <h1>{{ $action }} Cotizacion</h1>

  <p>
    <a href="{{ route('comercial.ventas.index') }}" class="btn btn-info">Lista de Cotizaciones</a>
   
  </p>

{{ Form::model($venta, $form_data, array('role' => 'form')) }}

  @include ('admin/errors', array('errors' => $errors))


  <table class="table table-bordered">
    <tr><strong>Datos cliente</strong>
    <td>
  <div class="row">
    <div class="form-group col-md-2">
      {{ Form::label('id_client', 'Cedula') }}
      {{ Form::text('id_client', null, array('placeholder' => 'Cedula cliente', 'class' => 'form-control input-sm')) }}
    </div>
    <div class="form-group col-md-4">
      {{ Form::label('full_name', 'Nombre completo') }}
      {{ Form::text('full_name', null, array('placeholder' => 'Nombre y apellido', 'class' => 'form-control input-sm')) }}        
    </div>
      <div class="form-group col-md-4">
      {{ Form::label('address', 'Direccion') }}
      {{ Form::text('address', null, array('placeholder' => 'Direccion', 'class' => 'form-control input-sm')) }}        
    </div>
    <div class="form-group col-md-2">
      {{ Form::label('ciudad', 'Ciudad') }}
      {{ Form::text('ciudad',null, array('class' => 'form-control input-sm')) }}
    </div>
  </div>
  <div class="row">
    
       <div class="form-group col-md-2">
      {{ Form::label('celular_phone', 'Movil') }}
      {{ Form::text('celular_phone',null, array('class' => 'form-control input-sm')) }}
      </div>

    <div class="form-group col-md-4">
      {{ Form::label('email', 'Correo electronico') }}
      {{ Form::text('email',null, array('class' => 'form-control input-sm')) }}
      
    </div>
   
    <div class="form-group col-md-2">
   
      {{ Form::label('phone', 'Telefono fijo') }}
      {{ Form::text('phone',null, array('class' => 'form-control input-sm')) }}
      
    </div>
  </div>
</td>
</tr>
   </table>
   
   <table class="table table-bordered" >

 {{--  ///////espacio para agregar hasta 3 vehiculos--}}
  


   


<input type="button" value="agregar vehiculo"  id="hide" >


  <table>
    
    <tbody>
      <tr>
        <td>
          <div id="div_new_vh">
          <table class="table table-bordered" >
             <table class="table table-bordered">
  {{ Form::open(array('onsubmit' => 'return false', 'id' => 'form-cmb')) }}
    <tr><strong>Datos Vehiculo</strong>
    <td>
  <div class="row">
    <div class="form-group col-md-2">
      {{ Form::label('clase_modelos', 'Tipo Modelo') }}
      {{ Form::select('clase_modelos', $clase_modelos,null ,array('id' => 'clase_modelos') )}}
    </div>

      <div class="form-group col-md-2">
      {{ Form::label('Referencia Vh', '') }}
      <select id="model" name"model">
        <option>escoja</option>
      </select>
    </div>
    <div id="respuesta"></div>
   {{Form::close()}}
    <div class="form-group col-md-4">
      {{ Form::label('full_name', 'Nombre completo') }}
      {{ Form::text('full_name', null, array('placeholder' => 'Nombre y apellido', 'class' => 'form-control input-sm')) }}        
    </div>
      <div class="form-group col-md-4">
      {{ Form::label('address', 'Direccion') }}
      {{ Form::text('address', null, array('placeholder' => 'Direccion', 'class' => 'form-control input-sm')) }}        
    </div>
    <div class="form-group col-md-2">
      {{ Form::label('ciudad', 'Ciudad') }}
      {{ Form::text('ciudad',null, array('class' => 'form-control input-sm')) }}
    </div>
  </div>
  <div class="row">
    
       <div class="form-group col-md-2">
      {{ Form::label('celular_phone', 'Movil') }}
      {{ Form::text('celular_phone',null, array('class' => 'form-control input-sm')) }}
      </div>

    <div class="form-group col-md-4">
      {{ Form::label('email', 'Correo electronico') }}
      {{ Form::text('email',null, array('class' => 'form-control input-sm')) }}
      
    </div>
   
    <div class="form-group col-md-2">
   
      {{ Form::label('phone', 'Telefono fijo') }}
      {{ Form::text('phone',null, array('class' => 'form-control input-sm')) }}
      
    </div>
  </div>
</td>
</tr>
   </table>
 </div>
   
   <table class="table table-bordered" >

          </table>
        </td>
      </tr>
    </tbody>
  </table>
   {{--  ///////  fin espacio para agregar hasta 3 vehiculos--}}
</table>










  {{ Form::button($action . ' cotizacion', array('type' => 'submit', 'class' => 'btn btn-primary')) }}    

{{ Form::close() }}






@stop
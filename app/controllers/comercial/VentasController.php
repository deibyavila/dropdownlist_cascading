<?php

use Codiesel\Entities\Venta;
use Codiesel\Entities\Vehiculo;

class Comercial_VentasController extends \BaseController {

	
  public function index()
   {

    $ventas=Venta::paginate();

    ///metodo de alerta utilizando facade e injeccion de dependencias
 Alert::message('Bienvenido al modulo de Cotizaciones', 'info');
 /////
    
    return View::make('comercial/ventas/list')->with('ventas', $ventas);
      
   }

    public function create()
   {

  
            
       
         # code...
      ///creo array para llenar cmb
    $datax = [ 'clase_modelos' =>Vehiculo::groupBy('clase_vh_modelo')->lists('clase_vh_modelo','id')];

        // Creamos un nuevo objeto User para ser usado por el helper Form::model
       $venta = new Venta;

      return View::make('comercial/ventas/form', $datax )->with('venta', $venta);

         if (Request::ajax())
              {
                 $legajo = Input::get('legajo');
                  
       $datay = [ 'clase_modelos' =>Vehiculo::find(3)->lists('nom_vh_modelo','id')]; 
       
             return Response::json($datay);    
                }
  

      
   }

   public function show($id)
   {
           $venta =Venta::find($id); 
            if(is_null($id)) App::abort(404);

             if (Request::ajax())
              {
                $input =$id;
              
               $datay = [ 'clase_modelos' =>Vehiculo::find($input)->lists('nom_vh_modelo','id')];
              
               return Response::json(array (
                'success' => true,
                
                'data'      =>  $datay
            ));
        }
         else{    //busco el id que biene por get
          return View::make('comercial.ventas.show',array('venta' => $venta));
      }   
   }


  public function store()
    {
      $detalleventa = new DetalleVenta();

  
        // Creamos un nuevo objeto para nuestro nuevo usuario
        $venta = new Venta;
        
        // Obtenemos la data enviada por el usuario
        $data = Input::all();

         // Revisamos si la data es válido
        if ($venta->validAndSave($data))
        {
           
            return Redirect::route('comercial.ventas.show', array($venta->id));
        }
        else
        {
            // En caso de error regresa a la acción create con los datos y los errores encontrados
          return Redirect::route('comercial.ventas.create')->withInput()->withErrors($venta->errors);
        }

        
        
        
        $data[] = array('modelo', 'valor_total','modelo_anuo','id_venta');
        
        foreach ($venta as $ven)
        {
            $data[] = array($ven->modelo, $ven->valor_total,$ven->modelo_anuo,$venta->id);
        }
        
        foreach ($data as $dat) 
        {
          $detalleventa->validAndSave($da);
        }

        //only('id_client','full_name','ciudad','celular_phone','phone','email');
        
            }

  

  public function edit($id)
{
$venta = Venta::find($id);
if (is_null ($venta))
{
App::abort(404);
}

return View::make('comercial/ventas/form')->with('venta', $venta);
}
   

   public function update($id)
   {
        // Creamos un nuevo objeto para nuestro nuevo usuario
        $user = User::find($id);
        
        // Si el usuario no existe entonces lanzamos un error 404 :(
        if (is_null ($user))
        {
            App::abort(404);
        }
        
        // Obtenemos la data enviada por el usuario
        $data = Input::all();
        
        // Revisamos si la data es válido
        if ($user->validAndSave($data))
        {
            // Si la data es valida se la asignamos al usuario
           
            // Y Devolvemos una redirección a la acción show para mostrar el usuario
            return Redirect::route('admin.users.show', array($user->id));
        }
        else
        {
            // En caso de error regresa a la acción edit con los datos y los errores encontrados
            return Redirect::route('admin.users.edit', $user->id)->withInput()->withErrors($user->errors);
        }
   }
   
    public function destroy($id)
   {
       if(is_null($id)) App::abort(404);

           
    }

 
 

  

   
   


   

	

}
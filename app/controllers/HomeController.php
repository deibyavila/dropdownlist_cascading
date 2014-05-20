<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	 public function getBuscar(){
      return View::make('legajos.buscar');
   } 
   public function postBuscar(){
      $empleados = array(
         array(
            'legajo' => '123',
            'nombre' => 'Cornelio',
            'apellido' => 'Del Rancho',
            'area' => 'Programación'
         ),
         array(
            'legajo' => '456',
            'nombre' => 'Modesto',
            'apellido' => 'Rosado',
            'area' => 'Recursos humanos'
         ),
         array(
            'legajo' => '789',
            'nombre' => 'Humberto',
            'apellido' => 'Vélez',
            'area' => 'Seguridad'
         )
       );
       $legajo = Input::get('legajo');
       foreach($empleados as $item){
          if($item['legajo'] == $legajo){
             return Response::json($item);
          }
       }
       return 0;
    }
}
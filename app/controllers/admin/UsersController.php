<?php

use Codiesel\Entities\User;

class Admin_UsersController extends \BaseController {

	
  public function index()
   {

    $users=User::paginate();

    ///metodo de alerta utilizando facade e injeccion de dependencias
 Alert::message('Bienvenido al modulo de administracion', 'info');
 /////
    
    return View::make('admin/users/list')->with('users', $users);

      
   }


	

      public function create()
   {
        // Creamos un nuevo objeto User para ser usado por el helper Form::model
        $user = new User;
      return View::make('admin/users/form')->with('user', $user);
   }



  public function store()
    {
        // Creamos un nuevo objeto para nuestro nuevo usuario
        $user = new User;
        // Obtenemos la data enviada por el usuario
        $data = Input::all();
        
        // Revisamos si la data es válido
        if ($user->validAndSave($data))
        {
           
            // Y Devolvemos una redirección a la acción show para mostrar el usuario
            return Redirect::route('admin.users.show', array($user->id));
        }
        else
        {
            // En caso de error regresa a la acción create con los datos y los errores encontrados
return Redirect::route('admin.users.create')->withInput()->withErrors($user->errors);
        }
    }


	
	public function show($id)
	{
		//busco el id que biene por get
        $user =User::find($id);

        if(is_null($id)) App::abort(404);

return View::make('admin/users/show',array('user' => $user) );
    //

	}


	
public function edit($id)
{
$user = User::find($id);
if (is_null ($user))
{
App::abort(404);
}

return View::make('admin/users/form')->with('user', $user);
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
       $user = User::find($id);
        
        if (is_null ($user))
        {
            App::abort(404);
        }
        
        $user->delete();

        if (Request::ajax())
        {
            return Response::json(array (
                'success' => true,
                'msg'     => 'Usuario ' . $user->full_name . ' eliminado',
                'id'      => $user->id
            ));
        }
        else
        {
            return Redirect::route('admin.users.index');
        }
    }
}
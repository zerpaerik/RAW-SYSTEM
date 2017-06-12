<?php

namespace RAW\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cache;
use DB;
use Illuminate\Support\Facades\Auth;
use RAW\Location;
use Illuminate\Support\Facades\Hash;

class locationController extends Controller
{

	public function index()
    {
        
      $data= Location::lista();
      if ($data){
         return view("location.listLocation",["data"=>$data]);
      }else{
         return view("layouts.nodata");

      }
    }

    public function create()
    {
      return view("location.create");

    }

    public function store ()
    {
    $data= array(
                      'nombre'=>Input::get('nombre'),
                      'pin'=>Input::get('perfil'),

                    );
         
        $guardar=Location::guardar($data);

        if ($guardar) {
            return Redirect::to('user/panelAdmin');
        }else{
            return Redirect::to('user');

        }
    }

    public function edit($id)
    {
      $usuario = Usuario::findOrFail($id);
      return view("user.update",['data'=>$usuario]);
    }

    public function update($id)
    {
        $data= array(
             'email'=>Input::get('email'),
             'nombre'=>Input::get('nombre'),
             'apellido'=>Input::get('apellido'),
             'perfil'=>Input::get('perfil')
              );

       $actualizar=Usuario::actualizar($id,$data);
       if ($actualizar) {
          return Redirect::to('user/listUser'); 
       }else{
          return Redirect::to('user');
       }

    }

    public function destroy($id)
    {
       $eliminar=Usuario::eliminar($id);
       if ($eliminar) {
          return Redirect::to('user/listUser'); 
       }else{
          return Redirect::to('user');
       }

    }
 	
 	public function login(){
 		$data= array(
 					        'email'=>Input::get('email'),
 		              'contrasena'=>Input::get('password'),
 			        );
         
        $login=Usuario::login($data);

 		if ($login) {
            return Redirect::to('regularuser/maininterface');
 		}else{
      Session::flash('success','Usuario o contraseña incorrectos');
 			return Redirect::to('regularuser');

 		}
 		
    }


    public function logout(){
 	    Session::flush();
 			return Redirect::to('regularuser');

    }

}

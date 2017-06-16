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
use RAW\Organismos;
use Illuminate\Support\Facades\Hash;


class organismosController extends Controller
{

	public function index()
    {
        
      $data= Organismos::lista();
      if ($data){
         return view("organismos.listOrganismos",["data"=>$data]);
      }else{
         return view("layouts.nodata");

      }
    }

    public function create()
    {
      $hola="HOla mundo";
      return view("organismos.create",["hola"=>$hola]);

    }

    public function store ()
    {
    $data= array(
                      'descripcion'=>Input::get('descripcion'),

                    );
         
        $guardar=Organismos::guardar($data);

        if ($guardar) {
            return Redirect::to('user/panelAdmin');
        }else{
            return Redirect::to('user');

        }
    }

    public function edit($id)
    {
      $organismo=Organismos::findOrFail($id);
      return view("organismos.update",['data'=>$organismo]);
    }

    public function update($id)
    {
        $data= array(
             'descripcion'=>Input::get('descripcion')
              );

       $actualizar=Organismos::actualizar($id,$data);
       if ($actualizar) {
          return Redirect::to('organismos/listOrganismos'); 
       }else{
          return Redirect::to('user');
       }

    }

    public function destroy($id)
    {
       $eliminar=Organismos::eliminar($id);
       if ($eliminar) {
          return Redirect::to('organismos/listOrganismos'); 
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
            return Redirect::to('user/panelAdmin');
 		}else{
      Session::flash('success','Usuario o contraseña incorrectos');
 			return Redirect::to('user');

 		}
 		
    }


    public function logout(){
 	    Session::flush();
 			return Redirect::to('user');

    }

}

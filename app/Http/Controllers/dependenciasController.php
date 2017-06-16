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
use RAW\Dependencias;
use Illuminate\Support\Facades\Hash;


class dependenciasController extends Controller
{

	public function index()
    {
        
      $data= Dependencias::lista();
      if ($data){
         return view("dependencias.listDependencias",["data"=>$data]);
      }else{
         return view("layouts.nodata");

      }
    }

    public function create()
    {
      return view("dependencias.create");

    }

    public function store ()
    {
    $data= array(
                      'descripcion'=>Input::get('descripcion'),

                    );
         
        $guardar=Dependencias::guardar($data);

        if ($guardar) {
            return Redirect::to('user/panelAdmin');
        }else{
            return Redirect::to('user');

        }
    }

    public function edit($id)
    {
      $dependencia=Dependencias::findOrFail($id);
      return view("organismos.update",['data'=>$dependencia]);
    }

    public function update($id)
    {
        $data= array(
             'descripcion'=>Input::get('descripcion')
              );

       $actualizar=Dependencias::actualizar($id,$data);
       if ($actualizar) {
          return Redirect::to('dependencias/listDependencias'); 
       }else{
          return Redirect::to('user');
       }

    }

    public function destroy($id)
    {
       $eliminar=Dependencias::eliminar($id);
       if ($eliminar) {
          return Redirect::to('dependencias/listDependencias'); 
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

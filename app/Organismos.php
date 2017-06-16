<?php

namespace RAW;

use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class Organismos extends Model
{
    protected $table='tblorganismo';
    protected $primaryKey='id';


    public $timestamps=false;

    protected $fillable =[
        'id',
        'descripcion'
        ];


    public static function login($data){
        $usuario = DB::table('usuarios')
                     ->where('email','=',$data['email'])
                     ->where('estatus','=','Activo')
                     ->first();

         if(!is_null($usuario)){
            if (Hash::check($data['contrasena'],$usuario->contrasena)) {
               Session::put('ID',$usuario->id);
               Session::put('NOMBRE',$usuario->nombre." ".$usuario->apellido);
               Session::put('PERFIL',$usuario->perfil);

               return true;
            }else{
               return false;
            }
         }else{
            return false;
         }        
    }

    public static function lista(){
        $organismo = DB::table('tblorganismo')
                     ->where('estatus','=','1')
                     ->paginate(5);

         if(!is_null($organismo)){
            return $organismo;
         }else{
            return false;
         }        
    }

    public static function guardar($data){
        $organismo=new Organismos;
        $organismo->descripcion=$data['descripcion'];

        $organismo->save();

         if(!is_null($organismo)){
            return true;
         }else{
            return false;
         }        
    }


    public static function actualizar($id,$data){
       $organismo=Organismos::findOrFail($id);
       $organismo->descripcion=$data['descripcion'];

       $organismo->update();

         if(!is_null($organismo)){
            return true;
         }else{
            return false;
         }        
    }

    public static function eliminar($id){
       $organismo=Organismos::findOrFail($id);
       $organismo->estatus='2';

       $organismo->update();

         if(!is_null($organismo)){
            return true;
         }else{
            return false;
         }        
    }

}

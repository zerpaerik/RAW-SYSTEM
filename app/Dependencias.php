<?php

namespace RAW;

use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class Dependencias extends Model
{
    protected $table='tbldependencia';
    protected $primaryKey='id';


    public $timestamps=false;

    protected $fillable =[
        'id',
        'descripcion',
        'id_org',
        'estatus'
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
        $dependencia = DB::table('tblorganismo')
                     ->where('estatus','=','1')
                     ->paginate(5);

         if(!is_null($dependencia)){
            return $dependencia;
         }else{
            return false;
         }        
    }

    public static function guardar($data){
        $dependencia=new Dependencias;
        $dependencia->descripcion=$data['descripcion'];

        $dependencia->save();

         if(!is_null($dependencia)){
            return true;
         }else{
            return false;
         }        
    }


    public static function actualizar($id,$data){
       $dependencia=Dependencias::findOrFail($id);
       $dependencia->descripcion=$data['descripcion'];

       $dependencia->update();

         if(!is_null($dependencia)){
            return true;
         }else{
            return false;
         }        
    }

    public static function eliminar($id){
       $dependencia=Dependencias::findOrFail($id);
       $dependencia->estatus='2';

       $dependencia->update();

         if(!is_null($dependencia)){
            return true;
         }else{
            return false;
         }        
    }

}

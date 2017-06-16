<?php

namespace RAW;

use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class Cargos extends Model
{
    protected $table='tblcargo';
    protected $primaryKey='id';


    public $timestamps=false;

    protected $fillable =[
        'id',
        'descripcion'
        ];


    public static function login($data){
        $cargo = DB::table('tblcargo')
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
        $cargo = DB::table('tblcargo')
                     ->where('estatus','=','1')
                     ->paginate(5);

         if(!is_null($cargo)){
            return $cargo;
         }else{
            return false;
         }        
    }

    public static function guardar($data){
        $cargo=new Cargos;
        $cargo->descripcion=$data['descripcion'];

        $cargo->save();

         if(!is_null($cargo)){
            return true;
         }else{
            return false;
         }        
    }


    public static function actualizar($id,$data){
       $cargo=Cargos::findOrFail($id);
       $cargo->descripcion=$data['descripcion'];

       $cargo->update();

         if(!is_null($cargo)){
            return true;
         }else{
            return false;
         }        
    }

    public static function eliminar($id){
       $cargo=Cargos::findOrFail($id);
       $cargo->estatus='2';

       $cargo->update();

         if(!is_null($cargo)){
            return true;
         }else{
            return false;
         }        
    }

}

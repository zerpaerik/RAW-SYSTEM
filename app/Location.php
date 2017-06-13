<?php

namespace RAW;

use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class Location extends Model
{

protected $table='location';
    protected $primaryKey='id';


    public $timestamps=false;

    protected $fillable =[
        'id',
        'nombre',
        'lat' ,
        'lng',
        ];



     public static function lista(){
        $location = DB::table('location')
                     ->paginate(5);

         if(!is_null($location)){
            return $location;
         }else{
            return false;
         }   


     public static function guardar($data){
        $location=new Location;
        $location->nombre=$data['nombre'];
        $location->lat=$data['lat'];
        $location->lng=$data['lng'];
       


        $location->save();

         if(!is_null($location)){
            return true;
         }else{
            return false;
         }        
    }

     public static function actualizar($id,$data){
       $location=Location::findOrFail($id);
       $location->nombre=$data['nombre'];
       $location->lat=$data['lat'];
       $location->long=$data['lng'];


       $location->update();

         if(!is_null($location)){
            return true;
         }else{
            return false;
         }        
    }

    public static function eliminar($id){
       $usuario=Usuario::findOrFail($id);
       $usuario->estatus='Inactivo';

       $usuario->update();

         if(!is_null($usuario)){
            return true;
         }else{
            return false;
         }        
    }




    //
}

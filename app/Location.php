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
                     ->where('Estatus','=','Activo')
                     ->paginate(5);

         if(!is_null($location)){
            return $location;
         }else{
            return false;
         } 
         }  


     public static function guardar($data){
        $location=new Location;
        $location->nombre=$data['nombre'];
        $location->lat=$data['lat'];
        $location->lng=$data['lng'];
        $location->Estatus='Activo';
       


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
       $location->lng=$data['lng'];


       $location->update();

         if(!is_null($location)){
            return true;
         }else{
            return false;
         }        
    }

    public static function eliminar($id){
       $location=Location::findOrFail($id);
       $location->Estatus='Inactivo';

       $location->update();

         if(!is_null($location)){
            return true;
         }else{
            return false;
         }        
    }




    //
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Domicilio;
use Carbon\Carbon;

class UserController extends Controller
{
    public function index(){
        $usuarios_bd = Domicilio::with('usuario')->get();

        foreach ($usuarios_bd as $key => $value) {
            # code...
            // dd($value->usuario);
         
            $edad = Carbon::createFromDate($value->usuario->fecha_nacimiento)->age;

            $datos[] = [
                 
                'nombre_usuario' => $value->usuario->name,
                'fecha_nacimiento' => $value->usuario->fecha_nacimiento,
                'edad' => $edad,
                'domicilio_completo' => $value->domicilio.' '.$value->numero_ext.' '.$value->colonia.' '.$value->codigo_postal.' '.$value->ciudad
        
                ];
      
        }

       

        return $datos;
    }
}

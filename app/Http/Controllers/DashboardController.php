<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\Torneo;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){ //View Login 

      $torneos = Torneo::all(); // Obtiene todos los torneos
      $equipos = Equipo::all(); // Obtiene todos los equipos
  
      //$equipos = Equipo::paginate(); //Take all Equipos by paging
      return view('Dashboard.dashboard',  compact('torneos', 'equipos')); //Folder and file (Route)
      }
    public function nosotros(){
      
      return view('Dashboard.nosotros');
    }
    public function home(){
      
      return view('Dashboard.home');
    }

      public function equipo(Equipo $equipo){
        $representante = User::find($equipo->user_id); //Search for the user "Representante" by user_id"
        return view('Dashboard.equipos',compact('equipo','representante')); #Passes records to view
      }
      public function torneo(Torneo $torneo){
        $organizador = User::find($torneo->user_id); //Search for the user "Representante" by user_id"
        return view('Dashboard.torneos',compact('torneo','organizador')); #Passes records to view
      }
}

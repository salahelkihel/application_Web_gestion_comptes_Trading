<?php

namespace App\Http\Controllers;
use App\Models\Trader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\Environment\Console;
use Symfony\Component\Console\Input\Input;
use Symfony\Component\VarDumper\Cloner\Data;

use function Complex\add;

class HomeController extends Controller
{

    public function index(Request $request)
    { 
      $trader = DB::table('traders')->distinct()->get(['num_compte']);
    
      $resul = DB::select(DB::raw("SELECT SUM(Action) as total_action,Type FROM `traders` GROUP BY(Type)"));

      $chartData="";
      foreach($resul as $list){
      $chartData.=   "['".$list->Type."', ".$list->total_action."],";
      
      }
      $ss=$request->get('num');
      $traderData = DB::table('traders')->select("Action as count")->where('num_compte', $ss)
         ->pluck('count');
      $month  = Trader::select(DB::raw("Month(Heure) as month"))->where('num_compte', $ss)    
          ->pluck('month');      
          $data= array(0,0,0,0,0,0,0,0,0,0,0,0);
          foreach($month as $index =>$month){
            $data[$month-1]=$traderData[$index];
          }
        $equipes = DB::table('equipes')->count();
        $compte = DB::table('comptes')->count();
        $responsable = DB::table('responsables')->count();
        $comptetradings = DB::table('comptetradings')->count();
        return view('home',compact('equipes','compte','responsable','comptetradings','chartData','trader','data'));
    }


    

}

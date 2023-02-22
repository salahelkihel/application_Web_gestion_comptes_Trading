<?php

namespace App\Http\Controllers;
use App\Models\comptetrading;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class comptetController extends Controller
{
    public function add(Request $request)
    {
       
        $res=new Comptetrading();
      
        $res->login=$request->input('login');
        $res->modepass=$request->input('modepass');
        $res->serveur=$request->input('serveur');
        $res->utilisateur=$request->input('utilisateur');
        $res->type_compte=$request->input('type_compte');
        $cin=$request->input('compte_id');
        $comptecin = DB::table('comptes')->where('cin',$cin)->select('id')->first();
       
        $res->compte_id= $comptecin->id;
        $res->save();   
        return redirect('comptetrading')->with('success','comptetrading created successfully.');
                        
    }
}

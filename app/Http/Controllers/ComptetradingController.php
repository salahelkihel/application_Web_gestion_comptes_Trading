<?php

namespace App\Http\Controllers;

use App\Models\comptetrading;
use Illuminate\Http\Request;
use App\Exports\ComptetradingExport;
use App\Imports\ComptetradingImport;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Brian2694\Toastr\Facades\Toastr;
class ComptetradingController extends Controller
{
    public function index(){
        $compte = DB::table('comptes')->get();
        $comptet = DB::table('comptetradings')
        ->join('comptes', 'comptetradings.compte_id', '=', 'comptes.id')
        ->select('comptetradings.*','comptes.cin as com_cin','comptes.id as id_cin')
        ->get();
      
    
        return view('gestion_comptetrading',['comptet'=>$comptet,'compte'=>$compte ]);
    
    }
    public function create()
    {
        return view('comptetrading.create');
    }
    public function edit(Comptetrading $Responsable)
    {
        return view('comptetrading.edit',compact('comptetrading'));
    }
    public function add(Request $request)
    {
        try{
        $res=new Comptetrading();
        $res->num_compte=$request->input('Num_Compte');

        $res->login=$request->input('login');
        $res->modepass=$request->input('modepass');
        $res->serveur=$request->input('serveur');
        $res->utilisateur=$request->input('utilisateur');
        $res->type_compte=$request->input('type_compte');

      
        $res->compte_id=$request->input('compte_id'); 
        $res->save();
        Toastr::success('comptetrading created successfully :)','Success');     
        return redirect('comptetrading');
       }catch(\Exception $e){
        Toastr::error('Data created fail :)','Error');
        return redirect()->back();
        }                 
    }
    public function addnew(Request $request)
    {
        try{
        $res=new Comptetrading();
        $res->num_compte=$request->input('Num_Compte');
        $res->login=$request->input('login');
        $res->modepass=$request->input('modepass');
        $res->serveur=$request->input('serveur');
        $res->utilisateur=$request->input('utilisateur');
        $res->type_compte=$request->input('type_compte');
        $cin=$request->input('compte_id');
        $comptecin = DB::table('comptes')->where('cin',$cin)->select('id')->first();
      
        $res->compte_id= $comptecin->id;
        $res->save(); 
        Toastr::success('comptetrading created successfully :)','Success');   
        return redirect('comptetrading');
    }catch(\Exception $e){
        Toastr::error('Data created fail :)','Error');
        return redirect()->back();
        }                  
    }
    public function update_compteT(Request $request,$id)
    {
        try{
        $res=Comptetrading::find($id);

        $res->login=$request->input('login');
        $res->modepass=$request->input('modepass');
        $res->serveur=$request->input('serveur');
        $res->utilisateur=$request->input('utilisateur');
        $res->type_compte=$request->input('type_compte');
        $res->compte_id=$request->input('compte_id');
      
      
        $res->save();
        Toastr::success('Comptetrading update successfully :)','Success');   
        return redirect('comptetrading');
    }catch(\Exception $e){
        Toastr::error('Data updated fail :)','Error');
        return redirect()->back();
        }                 
    }
    public function delete($id)
    {
        try{
        Comptetrading::where(['id'=>$id])->delete();
        Toastr::success('Comptetrading deleted successfully :)','Success');
        return redirect('comptetrading');
        }catch(\Exception $e){
        Toastr::error('Data deleted fail :)','Error');
        return redirect()->back();
        } 
                        
    }
    public function importform(Request $request){
        try{
        $file = $request->file('file');
        $nameFile= $file->getClientOriginalName();
        $file->move('Datacomptetrading',$nameFile);
        Excel::import(new ComptetradingImport ,public_path('/Datacomptetrading/'.$nameFile) );
        Toastr::success('comptetrading data successfully :)','Success');
        return redirect('comptetrading');
        }catch(\Exception $e){
        Toastr::error('Data added fail :)','Error');
        return redirect()->back();
        } 
    }
    public function export() 
    {
        return Excel::download(new ComptetradingExport, 'comptetrading.xlsx');
    }
}

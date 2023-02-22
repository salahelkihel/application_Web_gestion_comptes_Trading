<?php

namespace App\Http\Controllers;

use App\Exports\CompteExport;
use App\Models\Compte;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\CompteImport;
use App\Models\user;
use Brian2694\Toastr\Facades\Toastr;

class CompteController extends Controller
{
  
    public function index(){
      
        $equipes = DB::table('equipes')->distinct('id')->get();
        $comptes = DB::table('comptes')
        ->join('equipes', 'comptes.equipes_id', '=', 'equipes.id')
        ->select('comptes.*','equipes.id as id_eq','equipes.Libelle_Equipe as nom_eq')->get();
      
      
    
        return view('gestion_compte',['comptes'=>$comptes,'equipes'=>$equipes]);
    
    }
    public function create()
    {
        return view('Compte.create');
    }
  
    public function add(Request $request)
    {
        try{
        $res=new Compte();
        $res->cin=$request->input('cin');
        $res->nom=$request->input('nom');
        $res->prenom=$request->input('prenom');
        $res->Email=$request->input('Email');
        $res->Email_theCube=$request->input('EmailtheCube');
   
        $res->telephone=$request->input('telephone'); 
        $res->equipes_id=$request->input('equipe_id'); 
        $res->save();   
        Toastr::success('compte created successfully :)','Success');
        return redirect('compte');
        }catch(\Exception $e){
        Toastr::error('Data added fail :)','Error');
        return redirect()->back();
        } 
      
       
                        
    }
    public function update_compte(Request $request,$id)
    {
        try{
        $res=Compte::find($id);
      /* $eq = Equipe::all()->pluck('Libelle_Equipe');
        $data = DB::table('equipes')->where($select,$eq)
        ->select('id')
        ->get();*/
        $res->nom=$request->input('nom');
        $res->prenom=$request->input('prenom');
        $res->Email=$request->input('Email');
        $res->Email_theCube=$request->input('EmailtheCube');
        $res->telephone=$request->input('telephone'); 
  
        $res->cin=$request->input('cin');
        $res->equipes_id=$request->input('equipe_id') ; 
      
        $res->save();   
        Toastr::success('compte updated successfully :)','Success');
        return redirect('compte');

    }catch(\Exception $e){
    Toastr::error('Data added fail :)','Error');
    return redirect()->back();
    } 
                        
    }
    public function delete($id)
    {
        try{
        Compte::where(['id'=>$id])->delete();
        Toastr::success('compte deleted successfully :)','Success');
        return redirect('compte');

        }catch(\Exception $e){
        Toastr::error('Data added fail :)','Error');
        return redirect()->back();
        }                
    }
    public function importform(Request $request){
    
        try{
    $request->validate([
             'file'=>'required|mimes:xlsx'
        ]);
        $file = $request->file('file'); 
        $nameFile= $file->getClientOriginalName();
        $file->move('Datacompte',$nameFile);
        Excel::import(new CompteImport,public_path('/Datacompte/'.$nameFile) );
        Toastr::success('compte data successfully :)','Success');

        return redirect('compte');
       }catch(\Exception $e){
        Toastr::error('Data added fail :)','Error');
        return redirect()->back();
        } 
    }
    public function export() 
    {
        return Excel::download(new CompteExport(), 'comptes.xlsx');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipe;
use App\Exports\EquipeExport;
use App\Imports\EquipeImport;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Brian2694\Toastr\Facades\Toastr;
class EquipeController extends Controller
{

  
    
    public function index(){
        $res = DB::table('responsables')->get();
        $equipe = DB::table('equipes')
            ->join('responsables', 'responsables.id', '=', 'equipes.responsables_id')
            ->select('equipes.*','responsables.nom as nom_res')
            ->get();
    
        return view('gestion_equipe',['equipe'=>$equipe,'res'=>$res ]);

    }
    public function create()
    {
        return view('equipe.create');
    }
    public function edit(Equipe $equipe)
    {
        return view('equipe.edit',compact('equipe'));
    }
    public function store(Request $request)
    {
        try{
        $res=new Equipe();
        $res->id=$request->input('id');
        $res->Libelle_Equipe=$request->input('Libelle_Equipe');
        $res->responsables_id=$request->input('responsables_id');
     
        $res->save();  
        Toastr::success('Equipe created successfully :)','Success');   

        return redirect('equipe');
        }catch(\Exception $e){
        Toastr::error('Data created fail :)','Error');
        return redirect()->back();
        }                   
    }
    public function update(Request $request,$id= null)
    {
        try{
        $res=Equipe::find($id);
  
        $res->Libelle_Equipe=$request->input('Libelle_Equipe');
        $res->responsables_id=$request->input('responsables_id');
     
        $res->save();
        Toastr::success('Equipe Updated successfully :)','Success');  
        return redirect('equipe');
        }catch(\Exception $e){
        Toastr::error('Data Updated fail :)','Error');
        return redirect()->back();
        }                     
    }
    public function delete($id)
    {
        try{
        Equipe::where(['id'=>$id])->delete();
        Toastr::success('Equipe Deleted successfully :)','Success');  
        return redirect('equipe');
        }catch(\Exception $e){
        Toastr::error('Data Deleted fail :)','Error');
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
        $file->move('Dataequipe',$nameFile);
        Excel::import(new EquipeImport,public_path('/Dataequipe/'.$nameFile) );
        Toastr::success('Equipe data successfully :)','Success');
        return redirect('equipe')->with('success','equipe data successfully.');
        }catch(\Exception $e){
        Toastr::error('Data added fail :)','Error');
        return redirect()->back();
        }    
    }
    public function export() 
    {
        return Excel::download(new EquipeExport, 'equipe.xlsx');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\formation;
use Illuminate\Http\Request;
use App\Exports\FormationExport;
use App\Imports\FormationImport;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Brian2694\Toastr\Facades\Toastr;

class FormationController extends Controller
{
    public function index(){
        $formation=Formation::all();
        return view('formation',compact('formation'));
    }
    public function create()
    {
        return view('formation.create');
    }
    public function edit(Formation $equipe)
    {
        return view('formation.edit',compact('formation'));
    }
    public function add(Request $request)
    {
        try{
        $res=new Formation();
        $res->id=$request->input('id');
        $res->Nom_Formation=$request->input('Nom_Formation');
        $res->Type_Formation=$request->input('Type_Formation');
     
        $res->save();   
        Toastr::success('Formation created successfully :)','Success'); 
        return redirect('formation');
        }catch(\Exception $e){
        Toastr::error('Data created fail :)','Error');
        return redirect()->back();
        }                      
    }
    public function update(Request $request,$id= null)
    {
        try{
        $res=Formation::find($id);
        $res->id=$request->input('id');
        $res->Nom_Formation=$request->input('Nom_Formation');
        $res->Type_Formation=$request->input('Type_Formation');
     
        $res->save();   
        Toastr::success('Formation Updated successfully :)','Success'); 
        return redirect('formation');
        }catch(\Exception $e){
        Toastr::error('Data Updated fail :)','Error');
        return redirect()->back();
        }                
    }
    public function delete($id)
    {
        try{
        Formation::where(['id'=>$id])->delete();
        Toastr::success('Formation Deleted successfully :)','Success');  
        return redirect('formation');
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
        $file->move('Dataformation',$nameFile);
        Excel::import(new FormationImport,public_path('/Dataformation/'.$nameFile) );
        Toastr::success('Formation data successfully :)','Success');
        return redirect('formation');
       }catch(\Exception $e){
        Toastr::error('Data added fail :)','Error');
        return redirect()->back();
        } 
    }
    public function export() 
    {
        return Excel::download(new FormationExport, 'formation.xlsx');
    }
}


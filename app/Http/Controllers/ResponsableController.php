<?php

namespace App\Http\Controllers;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ResponsableImport;
use App\Exports\ResponsableExport;
use Illuminate\Http\Request;
use App\Models\Responsable;
use Brian2694\Toastr\Facades\Toastr;
class ResponsableController extends Controller
{
    public function index(){
        $Responsable=Responsable::all();
        return view('gestion_responsable',compact('Responsable'));
    }
    public function create()
    {
        return view('responsables.create');
    }
    public function edit(Responsable $Responsable)
    {
        return view('responsables.edit',compact('Responsable'));
    }
    public function store(Request $request)
    {
        try{
        $res=new Responsable();
        $res->nom=$request->input('nom');
        $res->prenom=$request->input('prenom');
        $res->Email=$request->input('Email');
        $res->telephone=$request->input('telephone'); 
        $res->save();   
        Toastr::success('responsable created successfully :)','Success'); 
        return redirect('responsable');
        }catch(\Exception $e){
        Toastr::error('Data created fail :)','Error');
        return redirect()->back();
        }                   
    }
    public function update(Request $request,$id)
    {
        try{
        $res=Responsable::find($id);
        $res->nom=$request->input('nom');
        $res->prenom=$request->input('prenom');
        $res->Email=$request->input('Email');
        $res->telephone=$request->input('telephone'); 
        $res->save();   
        Toastr::success('responsable Updated successfully :)','Success'); 
        return redirect('responsable');
    }catch(\Exception $e){
        Toastr::error('Data Updated fail :)','Error');
        return redirect()->back();
        }              
    }
    public function delete($id)
    {
    try{
       Responsable::where(['id'=>$id])->delete();
       Toastr::success('responsable deleted successfully :)','Success'); 
        return redirect('responsable');
        }catch(\Exception $e){
        Toastr::error('Data Deleted fail :)','Error');
        return redirect()->back();
        }                                  
    }
    public function importform(Request $request){
        try{
        $file = $request->file('file');
        $nameFile= $file->getClientOriginalName();
        $file->move('DataResponsable',$nameFile);
        Excel::import(new ResponsableImport,public_path('/DataResponsable/'.$nameFile) );
        Toastr::success('Responsable data successfully :)','Success');
        return redirect('Responsable');
        }catch(\Exception $e){
        Toastr::error('Data added fail :)','Error');
        return redirect()->back();
        } 
    }
    public function export() 
    {
        return Excel::download(new ResponsableExport, 'Responsable.xlsx');
    }
}

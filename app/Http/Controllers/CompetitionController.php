<?php

namespace App\Http\Controllers;
use App\Exports\CompetitionExport;
use App\Models\Competition;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\CompetitionImport;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;

class CompetitionController extends Controller
{
    public function index(){
        $comptetradings = DB::table('comptetradings')->distinct('id')->get();
        $Competition = DB::table('comptetradings')
        ->join('competitions', 'comptetradings.id', '=', 'competitions.num_compte')
        ->select('competitions.*','comptetradings.num_compte as num_compte','comptetradings.id as id_competitions')->get();

        return view('competition',['Competition'=>$Competition,'comptetradings'=>$comptetradings]);
    }
    public function create()
    {
        return view('competition.create');
    }
    public function edit(Competition $equipe)
    {
        return view('competition.edit',compact('competition'));
    }
    public function add(Request $request)
    {
        try{
        $res=new Competition();
    
     
        $res->statut_formation=$request->input('statut_formation');
        $res->Duree=$request->input('Duree');
        $res->decision=$request->input('decision');
        $res->num_compte=$request->input('Num_Compte');

        $res->save();  
       
        Toastr::success('competition created successfully :)','Success');

        return redirect('competition');
          }catch(\Exception $e){


            Toastr::error('Data added fail :)','Error');
            return redirect()->back();

          }                
    }
    public function update(Request $request,$id)
    {
        try{
        $res=Competition::find($id);
        $res->id=$request->input('id');
        $res->statut_formation=$request->input('statut_formation');
        $res->Duree=$request->input('Duree');
        $res->decision=$request->input('decision');
        $res->num_compte=$request->input('Num_Compte');
        $res->save();  
        Toastr::success('competition updated successfully :)','Success'); 
        return redirect('competition');
    }catch(\Exception $e){


        Toastr::error('Data updated fail :)','Error');
        return redirect()->back();

      }   
                        
    }
    public function delete($id)
    {
        try{
        Competition::where(['id'=>$id])->delete();
        Toastr::success('Data deleted successfully :)','Success');
        return redirect('competition');
        }catch(\Exception $e){
        Toastr::error('Data deleted fail :)','Error');
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
        $file->move('Datacompetition',$nameFile);
        Excel::import(new CompetitionImport,public_path('/Datacompetition/'.$nameFile) );
   
        Toastr::success('competition data successfully :)','Success');
    return redirect('competition');
        
    }catch(\Exception $e){
     Toastr::error('Data added fail :)','Error');
     return redirect()->back();
     } 
    }
    public function export() 
    {
        return Excel::download(new CompetitionExport(), 'Competition.xlsx');
    }
}

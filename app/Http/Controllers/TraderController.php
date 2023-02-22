<?php

namespace App\Http\Controllers;
use App\Models\Trader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Imports\TraderImport;
use Maatwebsite\Excel\Facades\Excel;
use Brian2694\Toastr\Facades\Toastr;
class TraderController extends Controller
{
    public function index(){
    $traders = DB::table('traders')->get();
    return view('gestion_trader',compact('traders'));
}
public function importform(Request $request){
    
    try{
$request->validate([
         'file'=>'required|mimes:xlsx'
    ]);
    $file = $request->file('file'); 
    $nameFile= $file->getClientOriginalName();
    $file->move('DataTrader',$nameFile);
    Excel::import(new TraderImport,public_path('/DataTrader/'.$nameFile) );
    Toastr::success('Traders data successfully :)','Success');

    return redirect('gestion_trader');
}catch(\Exception $e){
    Toastr::error('Data added fail :)','Error');
    return redirect()->back();
    } 
}
}
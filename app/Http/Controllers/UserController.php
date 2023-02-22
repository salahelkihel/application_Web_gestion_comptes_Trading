<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Login;
use Brian2694\Toastr\Facades\Toastr;
class UserController extends Controller
{
    function index(){
        $users = DB::table('logins')->get();
        return view('users',compact('users'));
    }

    function add(Request $request){

      

        $Login= new Login();
        $Login->username=$request->username;
        $Login->password=$request->password;
        $Login->Email=$request->Email;
        $Login->telephone=$request->telephone;  
     if($request->hasFile('photo')){
        $destination='public/images/'.$Login->image;
       $file=$request->file('photo');
       $extontion=$file->getClientOriginalExtension();
       $filename=time().'.'.$extontion;
       $file->move('images/', $filename);
      

       $Login->image= $filename;
     }
       
        $Login->save();
        Toastr::success('User added successfully :)','Success'); 
        return redirect('users');

    }
    public function edit($id)
    {  
        $user= Login::find($id);
        return view('users',compact('user'));
    }
    function update(Request $request,$id){
       
           $Login= Login::find($id);
        $Login->username=$request->username;
        $Login->password=$request->password;
        $Login->Email=$request->Email;
        $Login->telephone=$request->telephone;  
     if($request->hasFile('photo')){
        $destination='public/images/'.$Login->image;
       $file=$request->file('photo');
       $extontion=$file->getClientOriginalExtension();
       $filename=time().'.'.$extontion;
       $file->move('images/', $filename);
      

       $Login->image= $filename;
     }
       
       
   
 
        
   
        $Login->update();
        Toastr::success('User Updated successfully :)','Success'); 
        return redirect('users');
 
    }
    public function delete($id)
    {
        try{
            Login::where(['id'=>$id])->delete();
        Toastr::success('users deleted successfully :)','Success');
        return redirect('users');

        }catch(\Exception $e){
        Toastr::error('Data deleted fail :)','Error');
        return redirect()->back();
        }                
    }
}

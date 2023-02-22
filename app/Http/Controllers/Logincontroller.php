<?php
namespace App\Http\Controllers;


use App\Models\Login;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Hash;


class LoginController extends Controller
{
 

    public function login(){
        
        return view('loginpage');
    }
    function authenticate(Request $request){
          
        //Validate requests
        $request->validate([
             'username'=>'required',
             'password'=>'required'
        ]);
       
       
       
        $userInfo = login::where('username','=', $request->username)->first();
      
        
        $pass=$request->input('password');
   
     
            
        if(!$userInfo){
            return back()->with('fail','Incorrect username ');
        }else{
            //check password
            if($pass == $userInfo->password ){
         Toastr::success('login successfully :)','Success');


            $request->session()->put('LoggedUser', $userInfo->id);
              return redirect('/dashboard');
             
          
            }else{ 
        
              return back()->with('fail','Incorrect password'); 
            }
              
            
        }
    }

    function logout(){
        if(session()->has('LoggedUser')){
            session()->pull('LoggedUser');
            return redirect('/login');
        }
    }
    function dashboard(){
        
        return view('home');
    }
}
?>
<?php

namespace App\Http\Middleware;

use App\Models\User as ModelsUser;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;

class adminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
      if(!session()->has('LoggedUser') && ($request->path() !='/login'  )){
        return redirect('/login')->with('fail','You must be logged in');
    }

    if(session()->has('LoggedUser') && ($request->path() == '/login'  ) ){
        return back();
    }
    return $next($request);
 


  }
        
       
    }

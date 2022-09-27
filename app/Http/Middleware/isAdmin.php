<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\{Admin,User};
use Auth;

class isAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if  (auth()->check())
        {
            
            if(auth()->user()->is_admin==1){
                return $next($request); 
            }else{
                $user=Auth::user()->name;                 
                return redirect()->route('posts.index')->with('sucesso',"Bem vindo $user");
            }
        }
       
    }
}

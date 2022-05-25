<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class checkadmin
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
        if(Auth::guest()){
            return redirect()->route("admin_login")->with("error","Please Login Before");
        }
        else{
            $userRoles= Auth::user()->roles->pluck('name');
            if (!$userRoles->contains("admin")){
                return redirect()->route("admin_login")->with("error","Your are not an staff for enter here");
            }
        }


        return $next($request);
    }
}

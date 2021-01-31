<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Admin
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
        $user = Auth::user();
        if($user->is_admin == true){
            return $next($request);
        }
//        return redirect()->route('account');
        return redirect()->route('categories')->with('adminError', 'у Вас нет доступа на эту страницу');
    }
}

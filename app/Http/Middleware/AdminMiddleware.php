<?php

namespace App\Http\Middleware;

use Closure;
use Egulias\EmailValidator\Result\Reason\AtextAfterCFWS;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
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
        if (Auth::check()){
            if (Auth::user()->authorizeRoles(['superadmin', 'admin', 'editor'])){
                return $next($request);
            }else{
                return redirect('/');
            }
        }else{
            return redirect('admin/login');
        }

        return $next($request);
    }
}

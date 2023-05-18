<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$role)
    {
        
        $user = Auth::user();

        if ($user === null) {
            return redirect()->to(route('landing-page'));
        }
        
        foreach ($role as $roles) {
            if ($user->role == $roles) {
                return $next($request);
            }    
        }
        
 
        return redirect()
            ->to(route('unautorized-page'));
    }
}
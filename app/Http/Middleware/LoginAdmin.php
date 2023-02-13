<?php

namespace App\Http\Middleware;

use App\Models\Login;
use Closure;
use Illuminate\Http\Request;

class LoginAdmin
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
        $user = Login::user();
        if ($user->username === User::username) {
            return $next($request);
        }

        return redirect('login');
    }
}

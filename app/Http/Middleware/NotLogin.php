<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class NotLogin
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
        if (!session('user')) {
            return redirect()->route('form.login')->with([
                'class' => 'danger',
                'icon' => 'fas fa-ban',
                'message' => 'Please login to start your session!'
            ]);
        }
        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Domain\User\Actions\GetUserRedirect;

class CustomGuestMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!auth()->guest())
        {
            $user = auth()->user();
            
            $redirect = (new GetUserRedirect)($user);
            
            return redirect($redirect);
        }

        return $next($request);
    }
}

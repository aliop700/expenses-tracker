<?php

namespace App\Http\Middleware;

use Closure;
use Domain\Roles\Consts\Roles;
use Domain\User\Actions\GetUserRedirect;

class UserMiddleware
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
        $user = auth()->user();

        if($user->role_id != Roles::USER)
        {
            
            $redirect = (new GetUserRedirect)($user);

            return redirect($redirect);

        }

        return $next($request);
    }
}

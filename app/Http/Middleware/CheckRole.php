<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use Illuminate\Support\Facades\Auth;

class CheckRole
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
        $user = Auth::user();
        $roles = $user->getRoleNames(); // Returns a collection
        foreach ($roles as $id => $name_role)
        {
            if($name_role == 'administrator')
            {
                return $next($request);
            }
        }
        Session::flash('error', 'Извините, но у вас недостаточно прав для посещения данной страницы');
        return redirect('/plans');
    }
}

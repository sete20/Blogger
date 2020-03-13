<?php

namespace App\Http\Middleware;

use Closure;
use App\category;
class cheeckCategory
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
        $count = category::all()->count();
        if ($count == 0) {
           
            return redirect(route('categories.create'))->with( session()->flash('error', "Hi We'r Think You Might Need To Add Category "));
        }
        return $next($request);
    }
}

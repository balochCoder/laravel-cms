<?php

namespace App\Http\Middleware;

use App\Models\Category;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class VerifyCategoriesCount
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
        if (Category::all()->count() === 0) {
            Session::flash('error', 'Create Category first');
            return redirect(route('category.create'));
        }
        return $next($request);
    }
}

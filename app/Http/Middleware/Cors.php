<?php 

namespace Haricotton\Http\Middleware;

use Closure;

/**
* Class to handle CORS
*/
class Cors 
{
  
   /**
   * Handle an incoming request.
   *
   * @param  \Illuminate\Http\Request $request
   * @param  \Closure $next
   *
   * @return mixed
   */

   public function handle($request, Closure $next)
   {
      if ($_SERVER['REQUEST_METHOD'] == "OPTIONS") {
        # code...
        // Depending of your application you can't use '*'
        // Some security CORS concerns 
        return $next($request)
          ->header('Access-Control-Allow-Origin', '*')
          ->header('Access-Control-Allow-Methods', 'POST, GET, DELETE, PUT, PATCH, OPTIONS')
          ->header('Access-Control-Allow-Credentials', 'true')
          ->header('Access-Control-Max-Age', '1728000')
          ->header('Access-Control-Allow-Headers', 'Content-Type, Authorization, X-Requested-With');
      } 

      return $next($request)
        ->header('Access-Control-Allow-Origin', '*')
        ->header('Access-Control-Allow-Headers', 'Content-Type');

   }

}

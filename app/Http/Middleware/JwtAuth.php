<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\AuthController;
use App\Models\Sellers;

class JwtAuth
{
  /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
  */

  public function handle(Request $request, Closure $next)
  {
    // get token from header
    $token = $request->header('Authorization');
    session()->put('token', $token);
    if(!$token) return $this->response401();

    if(!AuthController::getJWT($token)) return $this->response401();
    return $next($request);
  } 
  
  
  public function response401()
  {
    return response()->json([
      'status' => 'error',
      'message' => 'Unauthorized'
    ], 401);
  }
}
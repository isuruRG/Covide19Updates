<?php

namespace App\Http\Middleware;

use Closure;
use JWTAuth;
use Exception;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;

class JwtMiddleware extends BaseMiddleware
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
        try {
            $user = \Tymon\JWTAuth\Facades\JWTAuth::parseToken()->authenticate();
        } catch (Exception $e) {
            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException){
                $error['data']['errors']['validations']['token'] = ['Token is Invalid'];
                return response()->json($error);
            }else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException){
                $error['data']['errors']['validations']['token'] = ['Token is Expired'];
                return response()->json($error);
            }else{
                $error['data']['errors']['validations']['token'] = ['Authorization Token not found'];
                return response()->json($error);
            }
        }
        return $next($request);
    }
}

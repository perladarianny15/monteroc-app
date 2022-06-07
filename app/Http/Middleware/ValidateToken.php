<?php

namespace App\Http\Middleware;

use App\UserToken;
use Closure;
use App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ValidateToken
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
        $headers = $request->bearerToken();

        if ($headers == '' OR $headers === null) {
            $response = [];
            $response['token'][0] = 'No Token received';
            return response()->json($response, 401);
        }
        $token = DB::table('personal_access_tokens')->where('token', '=', $headers)->first();

        if ($token == null)
        {
            $response = [];
            $response['token'][0] = 'Supplied token does not exist';
            return response()->json($response, 401);
        }

        return $next($request);
    }
}

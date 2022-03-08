<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;

class Authenticate
{
    /**
     * handle
     *
     * @param Request request
     * @param Closure next
     *
     * @return void
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->header('Bareer') != null) {
            $result = Http::post(env('AUTH_URL'), $request->header('Bareer'));
            if ($result->status() != Response::HTTP_OK) {
                return response('Unauthorized.', 401);
            }
        } else {
            return response('Unauthorized.', 401);
        }

        return $next($request);
    }
}

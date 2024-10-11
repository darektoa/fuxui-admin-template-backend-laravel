<?php

namespace App\Http\Middleware;

use App\Models\Log\ActivityLog as ActivityLogModel;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Response;

class ActivityLog
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $parameters = $request->all();
        $headers = $request->header();

        /** @disregard P1013, Method not indexed */
        ActivityLogModel::create([
            'access_token_id'   => Auth::check() ? Auth::user()->token()->id : null,
            'client_id'         => Auth::check() ? Auth::user()->token()->client_id : null,
            'user_id'           => Auth::user()->id ?? null,
            'name'              => Route::current()->getName(),
            'url'               => $request->fullUrl(),
            'ip'                => $request->ip(),
            'user_agent'        => $request->userAgent(),
            'parameters'        => $parameters ? json_encode($parameters): null,
            'headers'           => $headers ? json_encode($headers): null,
        ]);

        $response = $next($request);
        return $response;
    }
}

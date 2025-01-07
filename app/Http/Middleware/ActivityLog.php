<?php

namespace App\Http\Middleware;

use App\Models\Log\ActivityLog as ActivityLogModel;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Jenssegers\Agent\Agent;
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
        $methodMap  = [
            'index' => 'View List',
            'show' => 'View Detail',
            'store' => 'Create',
            'update' => 'Update',
            'destroy' => 'Delete',
        ];

        $action     = $request->route()->getActionName();
        $controller = $request->route()->getControllerClass();
        $methodName = explode("@", $action)[1];
        $pageName   = app($controller)->pageName ?? "Unknown Page";
        $actionName = $methodMap[$methodName] ?? Str::title($methodName);
        $parameters = $request->all();
        $headers    = $request->header();
        $agent      = new Agent();

        /** @disregard P1013, Method not indexed */
        ActivityLogModel::create([
            'access_token_id'   => Auth::check() ? Auth::user()->token()->id : null,
            'client_id'         => Auth::check() ? Auth::user()->token()->client_id : null,
            'user_id'           => Auth::user()->id ?? null,
            'name'              => "$pageName - $actionName",
            'url'               => $request->fullUrl(),
            'ip'                => $request->ip(),
            'user_agent'        => $request->userAgent(),
            'device'            => $agent->device() ? $agent->device() : null,
            'platform'          => $agent->platform() ? $agent->platform() : null,
            'browser'           => $agent->browser() ? $agent->browser() : null,
            'is_desktop'        => $agent->isDesktop() ? 1 : 0,
            'is_phone'          => $agent->isPhone() ? 1 : 0,
            'robot'             => $agent->robot() ? $agent->robot() : null,
            'parameters'        => $parameters ? json_encode($parameters): null,
            'headers'           => $headers ? json_encode($headers): null,
        ]);

        $response = $next($request);
        return $response;
    }
}

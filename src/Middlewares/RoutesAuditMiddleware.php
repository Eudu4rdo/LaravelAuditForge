<?php

namespace eudu4rdo\laravelauditforge\Middlewares;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use eudu4rdo\laravelauditforge\Services\AuditRoutesService;

class RoutesAuditMiddleware
{
    public function handle(Request $request, Closure $next): mixed
    {
        $response = $next($request);

        if (!config('audit-forge.audit_route.enabled')) {
            return $response;
        }

        if ($this->validateIgnoreRouteOrMethod($request->path(), $request->method())) {
            return $response;
        }

        $route       = $request->path();
        $method      = $request->method();
        $ip_address  = $request->ip();
        $user_agent  = $request->header('User-Agent');
        $status_code = $response->getStatusCode();
        $accessed_at = now();
        $user_id     = Auth::check() ? Auth::id() : null;

        AuditRoutesService::logWithJob($route, $method, $ip_address, $user_agent, $status_code, $accessed_at, $user_id);

        return $response;
    }

    public function validateIgnoreRouteOrMethod($current_route, $method)
    {
        $ignore_methods = config('audit-forge.audit_route.ignore_methods');
        if (in_array($method, $ignore_methods))
            return true;

        $ignore_routes = config('audit-forge.audit_route.ignore_routes');
        foreach ($ignore_routes as $route) {
            if (fnmatch($route, $current_route))
                return true;
        }
        return false;
    }
}

<?php

namespace eudu4rdo\laravelauditforge\Middlewares;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoutesAuditMiddleware
{
    public function handle(Request $request, Closure $next): mixed
    {
        if (!config('audit-forge.audit_route.enabled')) {
            return $next($request);
        }
        
        $response = $next($request);
        $user_id = Auth::check() ? Auth::id() : null;

        dd([
            'user_id'      => $user_id,
            'route'        => $request->path(),
            'method'       => $request->method(),
            'ip_address'   => $request->ip(),
            'user_agent'   => $request->header('User-Agent'),
            'status_code'  => $response->status(),
            'timestamp'    => now(),
        ]);

        return $next($request);
    }
}

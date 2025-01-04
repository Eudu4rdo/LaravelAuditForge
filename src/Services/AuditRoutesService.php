<?php
namespace eudu4rdo\laravelauditforge\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use eudu4rdo\laravelauditforge\Jobs\LogAuditRouteJob;

class AuditRoutesService
{
    public static function logWithJob($route, $method, $ip_address, $user_agent, $status_code, $accessed_at, $user_id = null)
    {
        if (config('audit-forge.audit_use_jobs', false)) {
            if (config('queue.default') !== 'sync') {
                LogAuditRouteJob::dispatch($route, $method, $ip_address, $user_agent, $status_code, $accessed_at, $user_id);
                return;
            } else {
                Log::warning('Queue not configured. Processing audit synchronously.');
            }
        }
        self::logAudit($route, $method, $ip_address, $user_agent, $status_code, $accessed_at, $user_id);
    }

    public static function logAudit($route, $method, $ip_address, $user_agent, $status_code, $accessed_at, $user_id)
    {
        DB::table(config('audit-forge.audit_routes.table', 'audit_routes'))->insert([
                'user_id'       => $user_id,
                'route'         => $route,
                'method'        => $method,
                'ip_address'    => $ip_address,
                'user_agent'    => $user_agent,
                'status_code'   => $status_code,
                'accessed_at'   => $accessed_at,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
    }
}
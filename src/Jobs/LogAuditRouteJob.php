<?php
namespace eudu4rdo\laravelauditforge\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use eudu4rdo\laravelauditforge\Services\AuditRoutesService;

class LogAuditRouteJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $route;
    protected $method;
    protected $ip_address;
    protected $user_agent;
    protected $status_code;
    protected $accessed_at;
    protected $user_id;

    public function __construct($route, $method, $ip_address, $user_agent, $status_code, $accessed_at, $user_id = NULL)
    {
        $this->route        = $route;
        $this->method       = $method;
        $this->ip_address   = $ip_address;
        $this->user_agent   = $user_agent;
        $this->status_code  = $status_code;
        $this->accessed_at  = $accessed_at;
        $this->user_id      = $user_id;
    }
    
    public function handle(): void
    {
        AuditRoutesService::logAudit($this->route, $this->method, $this->ip_address, $this->user_agent, $this->status_code, $this->accessed_at, $this->user_id);
    }
}
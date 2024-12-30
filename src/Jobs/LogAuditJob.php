<?php
namespace eudu4rdo\laravelauditforge\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use eudu4rdo\laravelauditforge\Services\AuditService;

class LogAuditJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $event;
    protected $model;
    protected ?array $originalData;
    protected ?array $changes;
    protected $user_id;

    public function __construct($event, $model, ?array $originalData = null, $changes, $user_id = null)
    {
        $this->event        = $event;
        $this->model        = $model;
        $this->originalData = $originalData;
        $this->changes      = $changes;
        $this->user_id      = $user_id;
    }
    
    public function handle(): void
    {
        AuditService::logAudit($this->event, $this->model, $this->originalData, $this->changes, $this->user_id);
    }
}
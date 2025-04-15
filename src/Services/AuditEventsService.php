<?php
namespace eudu4rdo\laravelauditforge\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use eudu4rdo\laravelauditforge\Jobs\LogAuditEventsJob;

class AuditEventsService
{
    public static function logWithJob(string $event, $model, $originalData = null, $user_id = null)
    {
        if (config('audit-forge.audit_use_jobs', false)) {
            if (config('queue.default') !== 'sync') {
                LogAuditEventsJob::dispatch($event, $model, $originalData, $model->getDirty(), $user_id);
                return;
            } else {
                Log::warning('Queue not configured. Processing audit synchronously.');
            }
        }
        self::logAudit($event, $model, $originalData, $model->getDirty(), $user_id);
    }

    public static function logAudit(string $event, $model, $originalData = null, $changes = null, $user_id = null)
    {
        DB::table(config('audit-forge.audit_events.table', 'audit_events'))->insert([
            'user_id'       => $user_id,
            'model'         => get_class($model),
            'model_key'     => $model->getKeyName(),
            'model_id'      => $model->getKey(),
            'event'         => $event,
            'changes'       => $changes ? json_encode($changes) : null,
            'original_data' => $originalData ? json_encode($originalData) : null,
        ]);
    }
}

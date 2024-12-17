<?php
namespace eudu4rdo\laravelauditforge\Services;

use eudu4rdo\laravelauditforge\Models\AuditEventsLog;

class AuditService
{
    protected static function logAudit(string $event, $model, $originalData = null, $user_id = null)
    {
        AuditEventsLog::create([
            'user_id'       => $user_id,
            'model'         => get_class($model),
            'model_id'      => $model->id ?? null,
            'event'         => $event,
            'changes'       => json_encode($model->getDirty()),
            'original_data' => $originalData ? json_encode($originalData) : null,
        ]);
    }
}

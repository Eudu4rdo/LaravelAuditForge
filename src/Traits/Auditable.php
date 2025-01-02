<?php
namespace eudu4rdo\laravelauditforge\Traits;

use eudu4rdo\laravelauditforge\Services\AuditEventsService;

trait Auditable
{
    protected static function bootAuditable()
    {
        static::creating(function ($model) {
            AuditEventsService::logWithJob($model->creating_name_action ?? 'creating', $model, null, auth()->id() ?? null);
        });

        static::updating(function ($model) {
            AuditEventsService::logWithJob($model->updating_name_action ??'updating', $model, $model->getOriginal(), auth()->id() ?? null);
        });

        static::deleting(function ($model) {
            AuditEventsService::logWithJob($model->deleting_name_action ??'deleting', $model, null, auth()->id() ?? null);
        });
    }
}
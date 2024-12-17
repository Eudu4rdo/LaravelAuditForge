<?php
namespace eudu4rdo\laravelauditforge\Traits;

use eudu4rdo\laravelauditforge\Services\AuditService;

trait Auditable
{
    protected static function bootAuditable()
    {
        static::creating(function ($model) {
            AuditService::logAudit('creating', $model, null, auth()->id() ?? null);
        });

        static::updating(function ($model) {
            AuditService::logAudit('updating', $model, $model->getOriginal(), auth()->id() ?? null);
        });

        static::deleting(function ($model) {
            AuditService::logAudit('deleting', $model, null, auth()->id() ?? null);
        });
    }
}
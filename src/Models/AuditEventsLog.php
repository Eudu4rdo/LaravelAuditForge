<?php
namespace eudu4rdo\laravelauditforge\Models;

use Illuminate\Database\Eloquent\Model;

class AuditEventsLog extends Model
{
    protected $table      = 'audit_events';

    protected $guarded    = ['id'];
    protected $fillable   = ['user_id', 'model','model_id','event','original_data','changes'];
    public $timestamps    = false;
}
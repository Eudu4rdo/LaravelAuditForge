<?php
namespace eudu4rdo\laravelauditforge\Models;

use Illuminate\Database\Eloquent\Model;

class AuditRoutes extends Model
{
    protected $table      = 'audit_routes';

    protected $guarded    = ['id'];
    protected $fillable   = ['user_id', 'route','method', 'ip_address', 'user_agent', 'status_code', 'accessed_at'];
}
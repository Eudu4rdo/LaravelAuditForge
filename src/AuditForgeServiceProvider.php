<?php
namespace eudu4rdo\LaravelAuditForge;

use Illuminate\Support\ServiceProvider;

class AuditForgeServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/audit-forge.php' => config_path('audit-forge.php'),
        ], 'audit-forge');

        $this->publishes([
            __DIR__ . '/../database/migrations' => database_path('migrations'),
        ], 'auditforge-migrations');
    }

    public function register()
    {
        // $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');
        // $this->mergeConfigFrom(__DIR__ . '/../../config/audit-forge.php', 'audit-forge');
        // $this->loadViewsFrom(__DIR__ . '/../../resources/views/', 'LaravelAuditForge');
    }
}

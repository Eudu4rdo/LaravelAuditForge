<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create(config('audit-forge.audit_events.table', 'audit_events'), function (Blueprint $table) {
            $table->id();

            if (config('audit-forge.user.key_type', 'int') === 'int') {
                $table->unsignedBigInteger(config('audit-forge.user.foreign_key', 'user_id'))->nullable();
            } else {
                $table->string(config('audit-forge.user.foreign_key', 'user_id'))->nullable();
            }

            $table->string('model');
            $table->string('model_id')->nullable();
            $table->string('event');
            $table->json('original_data')->nullable();
            $table->json('changes')->nullable();

            $table->timestamps();

            $table->foreign(config('audit-forge.user.foreign_key', 'user_id'))
                ->references(config('audit-forge.user.primary_key', 'id'))
                ->on(config('audit-forge.user.table', 'users'))
                ->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists(config('audit-forge.audit_events.table', 'audit_events'));
    }
};
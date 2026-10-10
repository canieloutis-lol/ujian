<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasColumn('keuangants', 'akuntansi_id')) {
            Schema::table('keuangants', function (Blueprint $table) {
                $table->foreignId('akuntansi_id')
                    ->nullable()
                    ->constrained('akutansis')
                    ->cascadeOnDelete();
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('keuangants', 'akuntansi_id')) {
            Schema::table('keuangants', function (Blueprint $table) {
                $table->dropConstrainedForeignId('akuntansi_id');
            });
        }
    }
};

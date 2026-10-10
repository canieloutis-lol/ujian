<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('keuangants') && ! Schema::hasColumn('keuangants', 'tanggal')) {
            Schema::table('keuangants', function (Blueprint $table) {
                $table->date('tanggal')->nullable();
            });
        }
    }

    public function down(): void
    {
        Schema::table('keuangants', function (Blueprint $table) {
            $table->dropColumn('tanggal');
        });
    }
};

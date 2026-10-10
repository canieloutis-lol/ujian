<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Akutansi;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (! Schema::hasTable('keuangants')) {
            Schema::create('keuangants', function (Blueprint $t) {
                $t->id();
                $t->string('nama');
                $t->foreignIdFor(Akutansi::class)->constrained()->onDelete('cascade');
                $t->date('tanggal')->nullable();
                $t->decimal('jumlah', 15, 2)->nullable();
                $t->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('keuangants');
    }
};

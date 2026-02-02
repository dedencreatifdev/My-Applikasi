<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('usergruppermissions', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('usergrup_id')->constrained('usergrups')->onDelete('cascade');
            $table->string('permission');
            $table->boolean('lihat')->default(false);
            $table->boolean('tambah')->default(false);
            $table->boolean('ubah')->default(false);
            $table->boolean('hapus')->default(false);
            $table->boolean('detail')->default(false);
            $table->boolean('export')->default(false);
            $table->boolean('import')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usergruppermissions');
    }
};

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
        Schema::create('kelolas', function (Blueprint $table) {
            $table->id();
            $table ->foreignId('user_id')
            ->constrained('users')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->text('alamat');
            $table->enum('jenis_sampah', [
                'Organik',
                'Anorganik',
                'B3'
            ]);
            $table->unsignedInteger('berat_sampah');
            $table->enum('status', [
                'belum diverifikasi',
                'terverifikasi'
            ])->default('belum diverifikasi');
            $table->date('tanggal_verifikasi')->nullable();
            $table->integer('point')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kelolas');
    }
};

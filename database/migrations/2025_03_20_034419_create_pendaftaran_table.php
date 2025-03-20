<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('pendaftaran', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap', 255);
            $table->string('nisn', 20)->unique();
            $table->string('tempat_lahir', 255);
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->string('asal_sekolah', 255);
            $table->string('nomor_hp', 15)->unique();
            $table->string('nama_ayah', 255);
            $table->string('nama_ibu', 255);
            $table->string('alamat_email', 255)->unique();
            $table->string('jurusan_pertama', 255);
            $table->string('jurusan_kedua', 255);
            $table->string('jurusan_ketiga', 255);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pendaftaran');
    }
};

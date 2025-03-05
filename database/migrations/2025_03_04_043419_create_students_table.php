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
        Schema::create('students', function (Blueprint $table) {
            $table->id(); //primary key
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->integer('class');
            $table->string('address');
            $table->boolean('gender');
            $table->boolean('status');
            $table->timestamps(); // created_at, update_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};

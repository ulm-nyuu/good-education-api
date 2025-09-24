<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('schools', function (Blueprint $table) {
            $table->id();
            $table->string('official_name', 255);
            $table->string('common_name', 255)->nullable();
            $table->foreignId('sector_id')->constrained('school_sectors')->cascadeOnDelete();
            $table->foreignId('type_id')->constrained('school_types')->cascadeOnDelete();
            $table->foreignId('governing_body_id')->nullable()->constrained('governing_bodies')->nullOnDelete();
            $table->integer('established_year')->nullable();
            $table->string('website', 255)->nullable();
            $table->string('contact_email', 255)->nullable();
            $table->string('contact_phone', 50)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('schools');
    }
};

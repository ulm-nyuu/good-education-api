<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('programs', function (Blueprint $table) {
            $table->id();
            $table->string('program_name', 255);
            $table->text('description')->nullable();
            $table->timestamps();
        });

        Schema::create('school_programs', function (Blueprint $table) {
            $table->foreignId('school_id')->constrained('schools')->cascadeOnDelete();
            $table->foreignId('program_id')->constrained('programs')->cascadeOnDelete();
            $table->primary(['school_id', 'program_id']);
        });
    }

    public function down(): void {
        Schema::dropIfExists('school_programs');
        Schema::dropIfExists('programs');
    }
};

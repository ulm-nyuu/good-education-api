<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('enrolments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('school_id')->constrained('schools')->cascadeOnDelete();
            $table->integer('year');
            $table->integer('total_students')->nullable();
            $table->integer('male_students')->nullable();
            $table->integer('female_students')->nullable();
            $table->integer('total_staff')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('enrolments');
    }
};

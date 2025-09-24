<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('school_sectors', function (Blueprint $table) {
            $table->id();
            $table->string('sector_name', 50);
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('school_sectors');
    }
};

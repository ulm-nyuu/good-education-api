<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('school_id')->constrained('schools')->cascadeOnDelete();
            $table->string('address', 255)->nullable();
            $table->string('suburb', 100)->nullable();
            $table->string('postcode', 10)->nullable();
            $table->foreignId('state_id')->constrained('states')->cascadeOnDelete();
            $table->decimal('latitude', 9, 6)->nullable();
            $table->decimal('longitude', 9, 6)->nullable();
            $table->string('region', 100)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('locations');
    }
};

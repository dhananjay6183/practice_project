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
        Schema::create('new_category', function (Blueprint $table) {
            $table->id();
            $table->string('category');
            $table->boolean('priority')->default(true);
            $table->text('description');
            $table->date('date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('category');
        Schema::dropIfExists('priority');
        Schema::dropIfExists('description');
        Schema::dropIfExists('date');
    }
};

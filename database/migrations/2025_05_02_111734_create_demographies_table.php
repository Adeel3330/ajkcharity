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
        Schema::create('demographies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('parent_id')->nullable()->constrained('demographies', 'id')->onDelete('cascade');
            $table->string('name', 50);
            $table->string('code', 50)->nullable();
            $table->enum('type', ['VILLAGE', 'CITY', 'TOWN', 'DISTRICT', 'CONSTITUENCY', 'TEHSIL', 'UNIONCOUNCIL', 'DIVISION', 'SUB-VILLAGE', 'MC', 'TC', 'PC', 'QH', 'CHARGE', 'CIRCLE'])->nullable();
            $table->integer('house_holds')->nullable();
            $table->integer('population')->nullable();
            $table->string('town_type')->nullable();
            $table->foreignId('created_by')->nullable()->constrained('users', 'id');
            $table->foreignId('updated_by')->nullable()->constrained('users', 'id');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('demographies');
    }
};

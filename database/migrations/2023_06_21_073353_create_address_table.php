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
        Schema::create('address', function (Blueprint $table) {
            $table->id();
            $table->string('bldg_no')->nullable();
            $table->string('street');
            $table->string('barangay');
            $table->string('city');
            $table->string('country') -> default('Philippines');
            $table->string('zipcode');
            $table->date("created_at")->default(now());
            $table->date("updated_at")->default(now());
            $table->boolean('deleted')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('address');
    }
};

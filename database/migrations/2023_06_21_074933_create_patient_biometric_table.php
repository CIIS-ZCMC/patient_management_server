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
        Schema::create('patient_biometric', function (Blueprint $table) {
            $table->id();
            $table->binary('finger_1')->nullable();
            $table->binary('finger_2')->nullable();
            $table->binary('finger_3')->nullable();
            $table->unsignedBigInteger('FK_patient_ID')->unsigned();
            $table->foreign('FK_patient_ID')->references('id')->on('patient')->onUpdate('cascade');
            $table->date('created_at')->default(now());
            $table->date('updated_at')->default(now());
            $table->date('deleted')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patient_biometric');
    }
};

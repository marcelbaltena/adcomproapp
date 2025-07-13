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
        Schema::create('companies', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('address');
        $table->string('postal_code');
        $table->string('city');
        $table->string('country');
        $table->string('vat_number');
        $table->string('chamber_of_commerce_number');
        $table->decimal('vat_rate_low', 5, 2)->default(0);
        $table->decimal('vat_rate_high', 5, 2)->default(0);
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};

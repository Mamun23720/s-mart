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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username')->nullable();
            $table->string('email');
            $table->string('password');
            $table->string('dob')->nullable();
            $table->string('number');
            $table->string('image')->nullable();
            $table->string('address')->nullable();
            $table->string('otp')->nullable();
            $table->boolean('is_email_verified')->default(false);
            $table->boolean('is_mobile_verified')->default(false);
            $table->timestamp('otp_expired_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};

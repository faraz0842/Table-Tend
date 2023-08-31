<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        if (! Schema::hasTable('users')) {
            Schema::create('users', function (Blueprint $table) {
                $table->id();
                $table->string('name', 50);
                $table->string('email', 50)->unique();
                $table->timestamp('email_verified_at')->nullable();
                $table->string('password', 255);
                $table->string('mobile_number', 50)->nullable();
                $table->string('address', 255)->nullable();
                $table->mediumText('short_biography')->nullable();
                $table->string('google_id', 255)->nullable();
                $table->string('apple_id', 255)->nullable();
                $table->string('facebook_id', 255)->nullable();
                $table->rememberToken();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};

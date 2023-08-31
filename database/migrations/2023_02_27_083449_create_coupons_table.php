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
        if (!Schema::hasTable('coupons')) {
            Schema::create('coupons', function (Blueprint $table) {
                $table->id();
                $table->string('slug', 255)->unique();
                $table->string('code', 20)->unique();
                $table->foreignId('discount_type_id')->constrained('discount_types')->cascadeOnUpdate()->cascadeOnDelete();
                $table->double('discount', 8, 2)->default(0);
                $table->dateTime('expiry_date')->nullable();
                $table->longText('description')->nullable();
                $table->boolean('enabled')->default(0);
                $table->softDeletes();
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
        Schema::dropIfExists('coupons');
    }
};

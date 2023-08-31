<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

return new class () extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        if (! Schema::hasTable('payment_status_translations')) {
            Schema::create('payment_status_translations', function (Blueprint $table) {
                $table->id();
                $table->foreignId('payment_status_id')->constrained('payment_statuses')->cascadeOnUpdate()->cascadeOnDelete();
                $table->string('locale', 20);
                $table->string('status', 50)->unique();
                $table->unique(['payment_status_id', 'locale']);
                $table->unique(['locale', 'status']);
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
        Schema::dropIfExists('payment_status_translations');
    }
};

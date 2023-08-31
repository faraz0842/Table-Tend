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
        if (! Schema::hasTable('order_status_translations')) {
            Schema::create('order_status_translations', function (Blueprint $table) {
                $table->id();
                $table->foreignId('order_status_id')->constrained('order_statuses')->cascadeOnUpdate()->cascadeOnDelete();
                $table->string('locale', 20);
                $table->string('status', 20);
                $table->unique(['order_status_id', 'locale']);
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
        Schema::dropIfExists('order_status_translations');
    }
};

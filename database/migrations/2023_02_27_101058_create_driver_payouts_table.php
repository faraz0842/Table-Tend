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
        if (! Schema::hasTable('driver_payouts')) {
            Schema::create('driver_payouts', function (Blueprint $table) {
                $table->id();
                $table->foreignId('user_id')->constrained('users')->cascadeOnUpdate()->cascadeOnDelete();
                $table->foreignId('payment_method_id')->constrained('payment_methods')->cascadeOnUpdate()->cascadeOnDelete();
                $table->double('amount', 9, 2)->default(0);
                $table->dateTime('paid_date')->nullable();
                $table->text('note')->nullable();
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
        Schema::dropIfExists('driver_payouts');
    }
};

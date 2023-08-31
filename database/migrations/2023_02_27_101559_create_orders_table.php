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
        if (! Schema::hasTable('orders')) {
            Schema::create('orders', function (Blueprint $table) {
                $table->string('id', 10)->primary();
                $table->string('name', 127);
                $table->string('receiver_phone_number', 50);
                $table->foreignId('user_id')->constrained('users')->cascadeOnUpdate()->cascadeOnDelete();
                $table->foreignId('restaurant_id')->nullable()->constrained('restaurants')->cascadeOnUpdate()->cascadeOnDelete();
                $table->double('tax', 5, 2)->default(0);
                $table->double('delivery_fee', 5, 2)->default(0);
                $table->double('discount', 9, 2);
                $table->double('sub_total', 9, 2);
                $table->double('total', 9, 2);
                $table->boolean('active')->default(1);
                $table->foreignId('driver_id')->nullable()->constrained('drivers')->cascadeOnUpdate()->cascadeOnDelete();
                $table->string('instructions', 255)->nullable();
                $table->foreignId('order_status_id')->constrained('order_statuses')->cascadeOnUpdate()->cascadeOnDelete();
                $table->foreignId('delivery_address_id')->constrained('delivery_addresses')->cascadeOnUpdate()->cascadeOnDelete();
                $table->foreignId('payment_id')->nullable()->constrained('payments')->cascadeOnUpdate()->cascadeOnDelete();
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
        Schema::dropIfExists('orders');
    }
};

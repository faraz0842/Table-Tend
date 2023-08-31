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
        if (! Schema::hasTable('drivers')) {
            Schema::create('drivers', function (Blueprint $table) {
                $table->id();
                $table->foreignId('user_id')->constrained('users')->unique()->cascadeOnUpdate()->cascadeOnDelete();
                $table->double('delivery_fee', 5, 2)->default(0);
                $table->unsignedInteger('total_orders')->default(0);
                $table->double('earning', 9, 2)->default(0);
                $table->boolean('available')->default(0);
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
        Schema::dropIfExists('drivers');
    }
};

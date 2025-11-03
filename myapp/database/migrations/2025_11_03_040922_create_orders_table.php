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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->uuid('cart_id'); // ✅ Đổi từ foreignId() sang uuid()
            $table->string('code')->unique();
            $table->string('full_name');
            $table->string('phone_number');
            $table->string('email');
            $table->string('shipping_address');
            $table->string('coupon_code')->nullable();
            $table->string('notes')->nullable();
            $table->timestamps();

            // ✅ Khóa ngoại đúng kiểu dữ liệu
            $table->foreign('cart_id')
                ->references('id')
                ->on('carts')
                ->cascadeOnUpdate()
                ->restrictOnDelete();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};

<?php

use App\Models\CartItem;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cart_items', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->integer('quantity')->default(CartItem::MIN_QUANTITY);
            $table->text('notes')->nullable();

            $table->uuid('cart_id');
            $table->unsignedBigInteger('product_id');

            // Cách 1: dùng foreignId + constrained() (gọn, Laravel-style)
            $table->foreign('cart_id')
                  ->references('id')
                  ->on('carts')
                  ->cascadeOnUpdate()
                  ->cascadeOnDelete();

            $table->foreign('product_id')
                  ->references('id')
                  ->on('products')
                  ->cascadeOnUpdate()
                  ->cascadeOnDelete();
            // Không cho trùng sản phẩm trong cùng giỏ
            $table->unique(['cart_id', 'product_id']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_items');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordered_products', function (Blueprint $table) {
            // $table->id();
            $table->uuid('id')->primary();
            $table->decimal('selling_price', 9, 2);
            $table->string('quantity');
            $table->decimal('total_amount', 9, 2);

            $table->foreignUuid('product_id');
            $table->foreignUuid('customer_order_id');

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('ordered_products', function($table) {
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('customer_order_id')->references('id')->on('customer_orders')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ordered_products');
    }
};

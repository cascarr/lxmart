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
        Schema::create('products', function (Blueprint $table) {
            // $table->id();
            $table->uuid('id')->primary();
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->decimal('price', 9, 2)->nullable();
            $table->text('description')->nullable();
            $table->string('product_img')->nullable();
            $table->string('product_imgpath')->nullable();

            $table->foreignUuid('category_id')->nullable();
            $table->foreignUuid('subcategory_id')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('products', function($table) {
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('subcategory_id')->references('id')->on('subcategories')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};

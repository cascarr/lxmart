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
        // Schema::dropIfExists('carts');
        Schema::create('carts', function (Blueprint $table) {
            // $table->id();
            $table->uuid('id')->primary();
            $table->string('quantity')->nullable();

            $table->foreignUuid('user_id')->nullable();
            $table->foreignUuid('prod_id')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('carts', function($table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('prod_id')->references('id')->on('products')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carts');
    }
};

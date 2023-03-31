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
        Schema::create('customer_orders', function (Blueprint $table) {
            // $table->id();
            $table->uuid('id')->primary();
            $table->string('cc_name');
            $table->string('cc_cvv');
            $table->string('cc_expirydate');
            $table->string('status')->default('0');
            $table->string('tracking_no');

            $table->foreignUuid('customer_id');

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('customer_orders', function($table) {
            $table->foreign('customer_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer_orders');
    }
};

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
        Schema::create('plastic_products', function (Blueprint $table) {
            $table->id();
            $table->string('plastic_product_name');
            $table->string('category');
            $table->string('description');
            $table->string('product_stat');
            $table->foreignId('user_id'); // ID of admin who added info to table.
            $table->string('icon')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plastic_products');
    }
};

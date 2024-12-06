<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->unique(); // for UT708D2574
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('sku');
            
            // JSON columns for complex data
            $table->json('categories')->nullable();
            $table->json('images')->nullable();
            $table->json('main_image')->nullable();
            $table->json('reviews')->nullable();
            $table->json('pricing')->nullable();
            $table->json('sizes')->nullable();
            $table->json('colors')->nullable();
            $table->json('stock')->nullable();
            $table->json('delivery')->nullable();
            $table->json('outstanding_features')->nullable();
            $table->json('washing_instructions')->nullable();
            $table->json('specifications')->nullable();
            $table->json('shipping')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
}
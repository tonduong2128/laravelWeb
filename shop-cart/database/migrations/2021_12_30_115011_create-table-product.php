<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
        Schema::create('table_product', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->integer('categoryId');
        $table->integer('brandId');
        $table->text('description');
        $table->text('content');
        $table->string('price');
        $table->string('image');
        $table->integer('status');
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
        // Schema::dropIfExists('table_product');
    }
}

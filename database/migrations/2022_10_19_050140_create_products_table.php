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
                      $table->id();
                      $table->string('name');
                      $table->string('slug');
                      $table->text('s_desc') -> nullable();
                      $table->text('p_desc') -> nullable();
                      $table->text('feat_image') -> nullable();
                      $table->text('gallery_image') -> nullable();
                      $table->text('size') -> nullable();
                      $table->text('color') -> nullable();
                      $table->integer('r_price');
                      $table->integer('s_price') -> nullable();
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
        Schema::dropIfExists('products');
    }
};

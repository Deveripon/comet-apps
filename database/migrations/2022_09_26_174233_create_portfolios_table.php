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
        Schema::create('portfolios', function (Blueprint $table) {
            $table->id();
            $table->string('title') -> unique();
            $table->string('slug')->unique();
            $table->string('type')-> nullable();
            $table->text('featured_img') -> nullable();
            $table->text('gallery_img')-> nullable();
            $table->text('steps') -> nullable();
            $table->string('client') -> nullable();
            $table->string('sub_date') -> nullable();
            $table->string('p_link') -> nullable();
            $table->text('p_desc') -> nullable();
            $table->boolean('status') -> default(true);
            $table->boolean('trash') -> default(false);
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
        Schema::dropIfExists('portfolios');
    }
};
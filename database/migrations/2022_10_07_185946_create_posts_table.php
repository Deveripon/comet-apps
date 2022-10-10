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
        Schema::create('posts', function (Blueprint $table) {
              $table->id();
              $table->unsignedInteger('admin_id');
              $table->string('title');
              $table->string('slug');
              $table->longText('content');
              $table->longText('featured');
              $table->text('post_type') -> default('standard');
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
        Schema::dropIfExists('posts');
    }
};
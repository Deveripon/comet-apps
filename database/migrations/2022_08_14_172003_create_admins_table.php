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
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email') -> unique();
            $table->string('cell') -> unique();
            $table->string('username') -> unique();
            $table->string('password');
            $table->string('photo')-> default('avater.png');
            $table->string('location') -> nullable();
            $table->string('date_of_birth') -> nullable();
            $table->string('address') -> nullable();
            $table->text('bio') -> nullable();
            $table->string('access_token') -> nullable();
            $table->unsignedInteger('role_id') -> default(3);
            $table->string('status') -> default(false);
            $table->string('trash') -> default(false);
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
        Schema::dropIfExists('admins');
    }
};

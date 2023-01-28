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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('password');
            $table->string('district');
            $table->string('address');
            $table->string('phone');
            $table->string('age');
            $table->string('group');
            $table->string('gender');
            $table->integer('RewardPoints')->default(0);
            //0 = user , 1 = admin
            $table->tinyInteger('role')->default(0)->comment('0=>user, 1=> admin');
            $table->string('image');
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
        Schema::dropIfExists('users');
    }
};

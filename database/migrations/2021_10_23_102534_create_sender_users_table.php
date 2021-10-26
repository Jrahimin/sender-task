<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSenderUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sender_users', function (Blueprint $table) {
            $table->id();
            $table->string('email_address',128);
            $table->string('name');
            $table->dateTime('dob')->index();
            $table->string('phone',32);
            $table->string('ip',32);
            $table->string('country',128);
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sender_users');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use \App\Enums\User_role;
use \App\Enums\User_status;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_name');
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->string('password');
            $table->text('avatar');
            $table->text('cover_photo');
            $table->string('address');
            $table->date('birthday');
            $table->integer('status')->default(User_status::ACTIVE);
            $table->integer('role')->default(User_role::USER);
            $table->timestamps();
//            $table->rememberToken();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}

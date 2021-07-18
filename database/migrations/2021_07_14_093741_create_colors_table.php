<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\Color_status;

class CreateColorsTable extends Migration
{
    public function up()
    {
        Schema::create('colors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('color_code');
            $table->timestamp('delete_at')->default(null);
            $table->integer('status')->default(Color_status::ACTIVE);
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('colors');
    }
}

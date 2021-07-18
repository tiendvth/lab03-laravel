<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\Feedback_status;

class CreateFeedbackTable extends Migration
{
    public function up()
    {
        Schema::create('feedback', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('product_id')->unsigned();
            $table->foreign('product_id')->references('id')->on('products');
            $table->integer('star');
            $table->text('message');
            $table->timestamp('deleted_at')->default(null);
            $table->integer('status')->default(Feedback_status::ACTIVE);
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('feedback');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\Product_option_status;

class CreateProductOptionsTable extends Migration
{

    public function up()
    {
        Schema::create('product_options', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id')->unsigned();
            $table->foreign('product_id')->references('id')->on('products');
            $table->integer('size_id')->unsigned();
            $table->foreign('size_id')->references('id')->on('sizes');
            $table->integer('color_id')->unsigned();
            $table->foreign('color_id')->references('id')->on('colors');
            $table->integer('quantity')->default(1);
            $table->integer('status')->default(Product_option_status::ACTIVE);
            $table->timestamp('deleted_at')->default(null);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('product_options');
    }
}

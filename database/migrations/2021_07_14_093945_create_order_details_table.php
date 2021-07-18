<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\Order_detail_status;

class CreateOrderDetailsTable extends Migration
{

    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id')->unsigned();
            $table->foreign('product_id')->references('id')->on('products');
            $table->integer('option_id')->unsigned();
            $table->foreign('option_id')->references('id')->on('product_options');
            $table->integer('order_id')->unsigned();
            $table->foreign('order_id')->references('id')->on('orders');
            $table->integer('quantity');
            $table->double('unit_price');
            $table->integer('status')->default(Order_detail_status::ACTIVE);
            $table->timestamp('deleted_at')->default(null);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('order_details');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\Order_status;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('total');
            $table->string('customer_name');
            $table->string('customer_email');
            $table->string('customer_address');
            $table->string('customer_phone');
            $table->integer('status')->default(Order_status::ACTIVE);
            $table->timestamp('deleted_at')->default(null);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
}

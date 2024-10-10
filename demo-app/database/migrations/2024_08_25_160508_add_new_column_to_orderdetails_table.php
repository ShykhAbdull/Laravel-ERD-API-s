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
        Schema::create('orderdetails', function (Blueprint $table) {
            $table->id();

            $table->bigInteger("orderNumber");
            $table->foreign("orderNumber")->references("orderNumber")->on("orders")->onDelete("cascade");

            $table->string("productCode");
            $table->foreign("productCode")->references("productCode")->on("products")->onDelete("cascade");
            
            $table->integer("quantityOrdered");
            $table->decimal("priceEach");
            $table->integer("orderLineNumber");

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
        Schema::dropIfExists('orderdetails');
    }
};

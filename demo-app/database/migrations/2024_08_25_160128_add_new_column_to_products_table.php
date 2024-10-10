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
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->string('productCode')->unique();
            $table->string("productName");
            $table->string("productLine");
            $table->foreign('productLine')->references('productLine')->on('productlines')->onDelete('cascade')->onUpdate("cascade");
            $table->string("productScale");
            $table->string("productVendor");
            $table->text("productDescription");
            $table->integer("quantityInStock");
            $table->decimal('buyPrice', 8, 2);
            $table->decimal('MSRP', 8, 2);
            

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
        Schema::dropIfExists('products');
    }
};

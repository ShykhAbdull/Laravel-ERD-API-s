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
        Schema::create('offices', function (Blueprint $table) {
            $table->id();

            $table->string('officeCode')->unique();
            $table->string("city");
            $table->string('phone',20); // Ensure this is set to 'string'
            $table->string("addressLine1");
            $table->string('addressLine2')->nullable();
            $table->string("state");
            $table->string("country");
            $table->string("postalCode",20);
            $table->string("territory");



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
        Schema::dropIfExists('offices');
    }
};

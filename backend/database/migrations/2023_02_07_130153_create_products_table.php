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
            $table->id('_id');
            $table->string('productName');
            $table->string('productNameType');
            $table->unsignedBigInteger('numeracioTerminal');
            $table->timestamp('soldAt');
            $table->string('customerId')->foreign('customerId')->constrained('customers', 'customerId');
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

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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->integer('invoice_number')->comment('field containing the invoice number');
            $table->double('vat_before_value')->comment('field containing vat before value of invoice');
            $table->double('value_to_pay')->comment('field containing value to pay of invoice');
            $table->unsignedBigInteger('vat_id')->comment('field containing vat id of invoice');
            $table->unsignedBigInteger('buyer_id')->comment('field containing buyer id of invoice');
            $table->unsignedBigInteger('user_id')->comment('field containing user id of invoice');

            $table->foreign('vat_id')->references('id')->on('vat_values');
            $table->foreign('buyer_id')->references('id')->on('buyers');
            $table->foreign('user_id')->references('id')->on('users');

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
        Schema::dropIfExists('invoices');
    }
};

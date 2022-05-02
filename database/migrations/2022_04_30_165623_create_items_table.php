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
        Schema::create('items', function (Blueprint $table) {
            $table->id()->comment('field containing id of vat item');
            $table->string('description',500)->comment('field containing description of item');
            $table->integer('quantity')->comment('field containing quantity of vat item');
            $table->double('unit_value')->comment('field containing unit value of vat item');
            $table->double('full_value')->comment('field containing full value of vat item');
            $table->unsignedBigInteger('invoice_id')->comment('field containing invoice id of vat item');

            $table->foreign('invoice_id')->references('id')->on('invoices');

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
        Schema::dropIfExists('items');
    }
};

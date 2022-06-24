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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->string('email');
            $table->string('cellphone');
            $table->integer('paid')->default(0);
            $table->bigInteger('user_id')->unsigned()->index()->nullable();
            $table->mediumText('comment')->nullable();

            $table->bigInteger('product_id')->unsigned()->index();
            $table->foreign('product_id')->references('id')
                ->on('products')->cascadeOnDelete();

            $table->bigInteger('progress_id')->unsigned()->index();
            $table->foreign('progress_id')->references('id')
                ->on('progress')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};

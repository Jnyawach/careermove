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
        Schema::create('works', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->bigInteger('user_id')->unsigned()->index();
            $table->string('organization');
            $table->string('title');
            $table->string('size');
            $table->integer('current')->nullable();
            $table->mediumText('responsibility');
            $table->mediumText('achievement');
            $table->bigInteger('profession_id')->unsigned()->index();
            $table->bigInteger('industry_id')->unsigned()->index();
            $table->date('start');
            $table->date('end')->nullable();
            $table->foreign('user_id')->references('id')
                ->on('users')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('works');
    }
};

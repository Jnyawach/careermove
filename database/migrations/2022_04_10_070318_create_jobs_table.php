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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title');
            $table->string('slug');
            $table->string('link')->nullable();
            $table->longText('description');
            $table->date('deadline');
            $table->bigInteger('status_id')->unsigned()->index();
            $table->bigInteger('industry_id')->unsigned()->index();
            $table->bigInteger('profession_id')->unsigned()->index();
            $table->bigInteger('location_id')->unsigned()->index();
            $table->bigInteger('company_id')->unsigned()->index();
            $table->foreign('industry_id')->references('id')
                ->on('industries')->cascadeOnDelete();
            $table->foreign('profession_id')->references('id')
                ->on('professions')->cascadeOnDelete();
            $table->foreign('location_id')->references('id')
                ->on('locations')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs');
    }
};

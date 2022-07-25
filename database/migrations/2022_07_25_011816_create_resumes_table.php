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
        Schema::create('resumes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->bigInteger('user_id')->unsigned()->index();
            $table->bigInteger('template_id')->unsigned()->index();
            $table->integer('personal_info')->default(1);
            $table->integer('intro')->default(1);
            $table->integer('education')->default(1);
            $table->integer('experience')->default(1);
            $table->integer('social_media')->default(1);
            $table->integer('hard_skills')->default(1);
            $table->integer('soft_skills')->default(1);
            $table->integer('language')->default(1);
            $table->integer('references')->default(1);
            $table->integer('certifications')->default(1);
            $table->integer('status')->default(1);
            $table->foreign('user_id')->references('id')
                ->on('users')->cascadeOnDelete();
            $table->foreign('template_id')->references('id')
                ->on('templates')->cascadeOnDelete();



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resumes');
    }
};

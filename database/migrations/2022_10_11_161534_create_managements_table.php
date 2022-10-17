<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManagementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('managements', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('direktur_id')->index();
            $table->bigInteger('departement_id')->index();
            $table->bigInteger('divisi_id')->index();
            $table->bigInteger('user_id')->index();
            $table->string('position');
            $table->string('jobdesc');
            $table->timestamps();

            $table->foreign('direktur_id')->references('id')->on('direktur')->onDelete('cascade');
            $table->foreign('departement_id')->references('id')->on('departement')->onDelete('cascade');
            $table->foreign('divisi_id')->references('id')->on('divisi')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('managements');
    }
}

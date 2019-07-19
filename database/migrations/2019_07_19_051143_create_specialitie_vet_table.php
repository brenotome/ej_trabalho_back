<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpecialitieVetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('specialitie_vet', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->unsignedBigInteger('specialitie_id')->nullable();
            $table->unsignedBigInteger('vet_id')->nullable();
            //fk
            $table->foreign('specialitie_id')->references('id')->on('specialities')->onDelete('set null');
            $table->foreign('vet_id')->references('id')->on('vets')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('specialitie_vet');
    }
}

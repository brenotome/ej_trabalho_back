<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnimalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            // $table->softDeletes();            
            $table->string('name');
            $table->unsignedBigInteger('specie_id')->nullable();
            $table->unsignedBigInteger('owner_id')->nullable();
            $table->decimal('weight',8,2);
            $table->decimal('size',8,2);
            $table->text('description');
            //fk
        });
        Schema::table('animals', function (Blueprint $table) {
            $table->foreign('owner_id')->references('id')->on('owners')->onDelete('cascade');
            $table->foreign('specie_id')->references('id')->on('species')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('animals');
    }
}

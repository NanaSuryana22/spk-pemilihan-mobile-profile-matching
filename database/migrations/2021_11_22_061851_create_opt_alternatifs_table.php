<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOptAlternatifsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opt_alternatifs', function (Blueprint $table) {
            $table->id();
            $table->integer('alternatif_id')->unsigned();
            $table->integer('kriteria_id')->unsigned();
            $table->integer('sub_kriteria_id')->unsigned();
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
        Schema::dropIfExists('opt_alternatifs');
    }
}

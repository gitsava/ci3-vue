<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWilayahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kecamatan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama', 50)->nullable();
            $table->timestamps();
        });

        Schema::create('kelurahan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('kec_id_fk')->unsigned();
            $table->string('nama', 50)->nullable();
            $table->string('alamat', 250)->nullable();
            $table->string('geomtri')->nullable();
            $table->timestamps();
            //cascade
            $table->foreign('kec_id_fk')->references('id')->on('kecamatan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('kelurahan', function($table) {
            $table->dropForeign('kec_id_fk');
            $table->foreign('kec_id_fk')->references('id')->on('kecamatan')->onDelete('cascade');
        });
        Schema::dropIfExists('kelurahan');
        Schema::dropIfExists('kecamatan');
    }
}

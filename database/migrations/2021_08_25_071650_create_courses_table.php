<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('level');
            $table->integer('kkm');
            $table->string('kode_guru');
            $table->string('nama_guru');
            $table->string('tahun_ajaran');
            $table->string('komponen1');
            $table->string('file1');
            $table->string('komponen2');
            $table->string('file2');
            $table->string('komponen3');
            $table->string('file3');
            $table->string('komponen4');
            $table->string('file4');
            $table->string('komponen5');
            $table->string('file5');
            $table->string('kode_guru2');
            $table->string('nama_guru2');
            $table->string('kode_guru3');
            $table->string('nama_guru3');
            $table->string('kode_guru4');
            $table->string('nama_guru4');
            $table->string('kode_guru5');
            $table->string('nama_guru5');
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
        Schema::dropIfExists('courses');
    }
}

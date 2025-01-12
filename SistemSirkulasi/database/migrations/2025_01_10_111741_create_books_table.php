<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    public function up()
{
    Schema::create('books', function (Blueprint $table) {
        $table->id();
        $table->string('judul');
        $table->string('pengarang');
        $table->string('penerbit');
        $table->year('tahun_terbit');
        $table->string('kategori');
        $table->string('rak');
        $table->string('status');
        $table->timestamps();
    });
}


    public function down()
    {
        Schema::dropIfExists('books');
    }
}

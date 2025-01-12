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
   // database/migrations/xxxx_xx_xx_create_peminjamans_table.php

public function up()
{
    Schema::create('peminjamans', function (Blueprint $table) {
        $table->id();
        $table->string('nim_nip');
        $table->string('nama');
        $table->string('grup_anggota');
        $table->string('status');
        $table->date('tanggal_pinjam');
        $table->date('tanggal_kembali');
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
        Schema::dropIfExists('peminjamen');
    }
};

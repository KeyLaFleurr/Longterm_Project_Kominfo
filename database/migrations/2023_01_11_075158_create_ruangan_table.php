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
        Schema::create('ruangan', function (Blueprint $table) {
            $table->id();
            $table->string('Nama');
            $table->date('waktu');
            $table->string('Jabatan');
            $table->string('Instansi');
            $table->string('NIP')->nullable();
            $table->unique('NIP');
            $table->string('Tujuan');
            $table->string('Jenis_kelamin');
            $table->string('No_Telephone');
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
        Schema::dropIfExists('ruangan');
    }
};

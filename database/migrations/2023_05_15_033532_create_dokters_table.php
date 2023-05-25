<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoktersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()

    {
        Schema::create('dokters', function (Blueprint $table) {
            $table->id();
            $table->string('kode_dokter', 10)->unique();
            $table->string('nama', 80);
            $table->enum('jenkel', ['Laki-laki', 'Perempuan']);
            $table->string('email', 80)->nullable()->unique();
            $table->string('telepon', 15)->nullable();
            $table->string('alamat')->nullable();
            $table->string('koddiv', 6);
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
        Schema::dropIfExists('dokters');
    }
}

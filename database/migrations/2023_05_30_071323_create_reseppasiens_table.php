<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReseppasiensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reseppasiens', function (Blueprint $table) {
            $table->id();
            $table->string('nopen', 25);
            $table->string('kode_obat', 25);
            $table->tinyInteger('qty')->default('1');
            $table->string('hargajual')->nullable('0');
            $table->string('bayar')->default('0');
            $table->string('ket')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reseppasiens');
    }
}

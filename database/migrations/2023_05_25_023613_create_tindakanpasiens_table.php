<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTindakanpasiensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tindakanpasiens', function (Blueprint $table) {
            $table->id();
            $table->string('nopen', 25);
            $table->string('jpitem_id', 25);
            $table->double('harga', 24.2);
            $table->tinyInteger('persendokter', 3);
            $table->double('komisidokter', 24.2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tindakanpasiens');
    }
}

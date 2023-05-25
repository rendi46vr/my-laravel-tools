<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJpItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jp_items', function (Blueprint $table) {
            $table->id();
            $table->string('kode', 30)->unique();
            $table->string('parameter');
            $table->double('biaya');
            $table->tinyInteger('perdok');
            $table->foreignId('jenispemeriksaan_id');
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
        Schema::dropIfExists('jp_items');
    }
}

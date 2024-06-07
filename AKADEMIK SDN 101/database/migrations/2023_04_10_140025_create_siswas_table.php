<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswas', function (Blueprint $table) {
            $table->id();
            $table->string('uuid', 36);
            $table->string('nama');
            $table->string('jk');
            $table->string('tempat');
            $table->string('ttl');
            $table->string('ayah');
            $table->string('ibu');
            $table->string('kerja_ayah');
            $table->string('kerja_ibu');
            $table->string('alamat');
            $table->string('kec');
            $table->string('kel');
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
        Schema::dropIfExists('siswas');
    }
}

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
        Schema::create('artikels', function (Blueprint $table) {
            $table->string('no', 30)->primary();
            $table->string('ArtikelFoto')->nullable();
            $table->string('ArtikelJudul');
            $table->string('ArikelSlug')->unique();
            $table->date('WaktuPembuatan');
            $table->text('ArtikelDeskripsi');
            $table->string('Author');
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
        Schema::dropIfExists('artikels');
    }
};

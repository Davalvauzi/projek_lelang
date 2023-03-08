<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('histories', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('lelangs_id');
            $table->foreignId('lelangs_id')->references('id')->on('lelangs');
            // $table->unsignedBigInteger('barangs_id');
            $table->foreignId('barangs_id')->references('id')->on('barangs');
            // $table->unsignedBigInteger('users_id');
            $table->foreignId('users_id')->references('id')->on('users');
            $table->string('harga_penawaran', 20);
            $table->enum('status', ['pending', 'gugur', 'pemenang']);
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
        Schema::dropIfExists('histories');
    }
}

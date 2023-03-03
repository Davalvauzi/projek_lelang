<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name', 25)->nullable();
            $table->string('username', 25)->unique();
            $table->string('password');
            $table->string('repassword');
            $table->string('telepon', 13)->nullable();
            $table->string('alamat')->nullable();
            $table->string('profile')->nullable();
            $table->enum('level', ['admin', 'petugas', 'masyarakat']);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}

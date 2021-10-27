<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode',100);
            $table->string('nama',100);
            $table->string('telepon',100)->nullable();
            $table->string('email',100)->nullable();
            $table->string('npwp',100)->nullable();
            $table->string('ktp',100)->nullable();
            $table->string('alamat',100)->nullable();
            $table->string('bank',100)->nullable();
            $table->string('rekening',100)->nullable();
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
        Schema::dropIfExists('suppliers');
    }
}

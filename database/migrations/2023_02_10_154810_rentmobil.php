<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rentmobils', function (Blueprint $table) {
            $table->id();
            $table->string('kode')->index();
            $table->string('ktp');
            $table->string('nama');
            $table->string('nik');
            $table->string('no_telp');
            $table->string('tgl_sewa');
            $table->string('tgl_kembali');
            $table->string('hari');
            $table->string('faktur')->index()->nullable();
            $table->string('total_pembayaran')->nullable();
            $table->string('total_dp')->nullable();
            $table->string('status');
            $table->string('bukti')->nullable();
            $table->string('rk')->nullable();
            $table->string('tgl_dp')->nullable();
            $table->string('role_id')->nullable();
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
        Schema::dropIfExists('rentmobils');
    }
};
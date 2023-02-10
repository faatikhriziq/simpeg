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
        Schema::table('riwayat_pelatihans', function (Blueprint $table) {
            $table->unsignedBigInteger('karyawan_id')->after('id')->required();
            $table->foreign('karyawan_id')->references('id')->on('karyawans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('riwayat_pelatihans', function (Blueprint $table) {
            $table->dropForeign(['karyawans_id']);
            $table->dropColumn('karyawans_id');
        });
    }
};

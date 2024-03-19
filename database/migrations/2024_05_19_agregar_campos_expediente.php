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
        Schema::table('expedientes', function (Blueprint $table) {
            $table->string('contraparte')->after('iniciador');
            $table->string('motivo');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->enum('estado', ['Abierto', 'Finalizado'])->default('Abierto');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('expedientes', function (Blueprint $table) {
            $table->dropColumn('contraparte');
            $table->dropColumn('motivo');
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
            $table->dropColumn('estado');
        });
    }
};
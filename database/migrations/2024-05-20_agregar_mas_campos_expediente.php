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
            $table->text('otro')->after('motivo');
            $table->string('numero_dictamen');
            $table->text('dictamen'); 
            $table->text('pase');

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
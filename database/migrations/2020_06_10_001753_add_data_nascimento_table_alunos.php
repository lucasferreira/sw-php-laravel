<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDataNascimentoTableAlunos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('alunos', function (Blueprint $table) {
            $table->date('data_nascimento')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('alunos', function (Blueprint $table) {
            $table->dropColumn('data_nascimento');
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVerbasIndenizatoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('verba_indenizatorias', function (Blueprint $table) 
        {
            $table->id();
            $table->string('deputado_ids');
            $table->string('mes');
            $table->string('deputado_nomes');
            $table->string('reembolso_valores')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('verbas_indenizatorias');
    }
}

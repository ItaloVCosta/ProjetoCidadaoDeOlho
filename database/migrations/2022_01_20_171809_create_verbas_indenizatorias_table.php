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
            $table->integer('deputado_ids');
            $table->string('mes',9);
            $table->string('deputado_nomes');
            $table->decimal('reembolso_valores')->nullable();
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
        Schema::dropIfExists('verbas_indenizatorias');
    }
}

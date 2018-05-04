<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEncurtadorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('encurtador', function (Blueprint $table) {
            $table->increments('id');
            $table->string('url_destino');
            $table->string('alias');
            $table->text('observacoes');

            $table->integer('user_id')->unsigned();

            $table->integer('cliques')->unsigned();
            $table->datetime('validade');
            
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
        Schema::dropIfExists('encurtadors');
    }
}

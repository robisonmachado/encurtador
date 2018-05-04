<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEncurtadorTable extends Migration
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
            $table->string('alias')->unique();
            $table->text('observacoes')->nullable();

            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')
                    ->references('id')->on('users')
                    ->onDelete('cascade');

            $table->bigInteger('cliques')->unsigned()->default(0);
            $table->timestamp('validade')->nullable();
            
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
        Schema::dropIfExists('encurtador');
    }
}

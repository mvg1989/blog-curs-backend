<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Primera extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_usuari',function(Blueprint $table){
            $table->id();
            $table->string('nom');
            $table->string('llinatges');
            $table->string('usuari');
            $table->dateTime('created_at', $precision = 0);
        });
        Schema::create('a_categoria',function(Blueprint $table){
            $table->id();
            $table->string('nom');
        });
        Schema::create('t_post',function(Blueprint $table){
            $table->id();
            $table->string('titol');
            $table->string('imatge');
            $table->text('descripcio');
            $table->string('contingut');
            $table->foreignId('idUsuari')->references('id')->on('t_usuari')->nullable();
            $table->timestamps();
        });
        Schema::create('r_categoria_post',function(Blueprint $table){
            $table->foreignId('idPost')->references('id')->on('t_post');
            $table->foreignId('idCategoria')->references('id')->on('a_categoria');
        });
        Schema::create('t_comentari',function(Blueprint $table){
            $table->id();
            $table->text('text');
            $table->foreignId('idPost')->references('id')->on('t_post');
            $table->foreignId('idUsuari')->references('id')->on('t_usuari')->nullable();
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
        Schema::table('t_comentari', function (Blueprint $table) {
            $table->dropForeign('t_comentari_idpost_foreign');
            $table->dropForeign('t_comentari_idusuari_foreign'); 
        });

        Schema::dropIfExists('t_comentari');
        
        Schema::table('r_categoria_post', function (Blueprint $table) {
            $table->dropForeign('r_categoria_post_idcategoria_foreign');
            $table->dropForeign('r_categoria_post_idpost_foreign'); 
        });
        
        Schema::dropIfExists('r_categoria_post');
        
        Schema::table('t_post', function (Blueprint $table) {
            $table->dropForeign('t_post_idusuari_foreign');
        });
        
        Schema::dropIfExists('t_post');
        
        Schema::dropIfExists('a_categoria');
        
        Schema::dropIfExists('t_usuari');

    }
}

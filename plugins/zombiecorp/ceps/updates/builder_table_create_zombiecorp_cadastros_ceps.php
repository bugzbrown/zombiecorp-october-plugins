<?php namespace Zombiecorp\Ceps\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateZombiecorpCepsCeps extends Migration
{
    public function up()
    {
        Schema::create('zombiecorp_ceps_ceps', function($table)
        {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id')->unsigned();
            $table->string('cep', 12);
            $table->string('tipo_logradouro', 120);
            $table->string('logradouro', 250);
            $table->string('bairro', 180);
            $table->string('cidade', 180);
            $table->string('uf', 4);
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('zombiecorp_ceps_ceps');
    }
}

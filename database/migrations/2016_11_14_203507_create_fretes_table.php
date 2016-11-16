<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFretesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fretes', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('product_id')->unsigned();
            $table->foreign('product_id')->references('id')->on('products');
			$table->string('tipo', 10);
			$table->string('formato');      
			$table->integer('cep_destino'); 
			$table->integer('cep_origem');   
			$table->string('peso');              
			$table->string('comprimento');       
			$table->string('altura');            
			$table->string('largura');          
			$table->string('diametro');    
			
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
        Schema::drop('fretes');
    }
}

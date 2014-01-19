<?php

use Illuminate\Database\Migrations\Migration;

class CreateProductChooserReportTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {        
        // create groups 
        Schema::create('groups', function($table){
            $table->increments('id')->unsigned();
            $table->integer('display_count');            
            $table->string('name');
            $table->text('description');
            $table->timestamps();
        });
        
        // create products
        Schema::create('products', function($table){
            $table->increments('id');
            $table->integer('display_count');            
            $table->string('hash');            
            $table->string('title');
            $table->string('picture_url_1');    
            $table->string('picture_url_2');                
            $table->string('product_type');                        
            $table->text('description')->nullable();
            $table->timestamps();
            // foreign key
            $table->integer('group_id')->unsigned();                        
            $table->foreign('group_id')->references('id')->on('groups')->unsigned();
        });

        // create report
        Schema::create('reports', function($table){
                $table->increments('id');
                $table->text('session');
                $table->text('step');
                $table->text('q1');
                $table->text('q2');
                $table->text('q3');
                $table->text('q4');
                $table->timestamps();
                // foreign key
                $table->integer('product_id')->unsigned();
                $table->foreign('product_id')->references('id')->on('products')->unsigned();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        // drop groups
        Schema::dropIfExists('products');                       
        Schema::dropIfExists('groups');
        Schema::dropIfExists('reports');
    }
}
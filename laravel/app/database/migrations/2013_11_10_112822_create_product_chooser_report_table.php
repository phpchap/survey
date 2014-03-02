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
            $table->string('csv_item_no');
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
                $table->text('session_id');
                $table->text('step');
                $table->text('ip');
                $table->timestamps();
            });

        // create product answers
        Schema::create('product_answers', function($table){
                $table->increments('id');
                $table->integer('question_one');
                $table->integer('question_two');
                $table->integer('question_three');
                $table->integer('question_four');
                $table->string('answer_one');
                $table->string('answer_one_index');
                $table->string('answer_two');
                $table->string('answer_two_index');
                $table->string('answer_three');
                $table->string('answer_four');
                $table->timestamps();
                // foreign key
                $table->integer('product_id')->unsigned();
                $table->foreign('product_id')->references('id')->on('products')->unsigned();
                // foreign key
                $table->integer('report_id')->unsigned();
                $table->foreign('report_id')->references('id')->on('reports')->unsigned();
            });

        // create answers
        Schema::create('answers', function($table){
                $table->increments('id');
                $table->integer('question_number');
                $table->string('question');
                $table->string('answer');
                $table->string('answer_index');
                $table->timestamps();
                // foreign key
                $table->integer('report_id')->unsigned();
                $table->foreign('report_id')->references('id')->on('reports')->unsigned();
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
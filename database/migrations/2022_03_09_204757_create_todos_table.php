<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTodosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('todos', function (Blueprint $table) {
            //create column and define the type of that column
            $table->increments('id');
            $table->string('name');//varchar
            $table->text('description');//text
            $table->boolean('completed');//tinyint
            //this timestamps creates the created_at and updated_at columns in the table to tell you when a row was updated or created
            $table->timestamps();//timestamp
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('todos');
    }
}

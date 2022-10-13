<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSouscategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('souscategories', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->string("nom");
            $table->string('slug')->unique();
            $table->integer('parent_id')->unsigned()->nullable();
            $table->integer('position')->unsigned()->nullable();
			$table->integer('status')->default(0);
            $table->integer('featured')->default(0);
          
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
        Schema::dropIfExists('souscategories');
    }
}

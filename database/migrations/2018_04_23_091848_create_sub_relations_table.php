<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubRelationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_relations', function (Blueprint $table) {
            $table->integer("subscriber_id")->unsigned();;
            $table->integer("category_id")->unsigned();;
            $table->primary(array('subscriber_id', 'category_id'));	
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
        Schema::dropIfExists('sub_relations');
    }
}

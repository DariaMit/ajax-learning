<?php namespace Daria\Learning\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

/**
 * CreateItemsTable Migration
 */
class CreateItemsTable extends Migration
{
    public function up()
    {
        Schema::create('daria_learning_items', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('daria_learning_items');
    }
}

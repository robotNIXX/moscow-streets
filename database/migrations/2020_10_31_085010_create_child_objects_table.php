<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChildObjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('child_objects', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('root_id');
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->unsignedBigInteger('object_id');
            $table->unsignedBigInteger('parent_object_id');
            $table->foreign('parent_object_id')->references('id')->on('objects')->onDelete('cascade');
            $table->unsignedBigInteger('ogh_object_type_id');                                         //Данные о типе ОГХ
            $table->foreign('ogh_object_type_id')->references('id')->on('ogh_types')->onDelete('restrict');
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
        Schema::dropIfExists('child_objects');
    }
}

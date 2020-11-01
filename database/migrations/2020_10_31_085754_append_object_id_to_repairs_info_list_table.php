<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AppendObjectIdToRepairsInfoListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('repairs_info_list', function (Blueprint $table) {
            $table->unsignedBigInteger('object_id');
            $table->foreign('object_id')->references('id')->on('objects')->onDelete('cascade');
        });
        Schema::dropIfExists('repairs_objects');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('repairs_info_list', function (Blueprint $table) {
            $table->dropColumn('object_id');
        });
    }
}

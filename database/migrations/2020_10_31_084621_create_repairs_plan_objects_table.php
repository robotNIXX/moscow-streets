<?php
    
    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;
    
    class CreateRepairsPlanObjectsTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('repairs_plan_objects', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('object_id');
                $table->foreign('object_id')->references('id')->on('objects')->onDelete('cascade');
                $table->unsignedBigInteger('repair_item_id');
                $table->foreign('repair_item_id')->references('id')->on('repairs_plan')->onDelete('cascade');
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
            Schema::dropIfExists('repairs_plan_objects');
        }
    }

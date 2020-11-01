<?php
    
    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;
    
    class CreateInspectionTasksTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('inspection_tasks', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('object_id');
                $table->text('start_repair_border');
                $table->text('end_repair_border');
                $table->string('region');
                $table->text('reason');
                $table->string('program');
                $table->string('category');
                $table->double('repair_carriageway', 20, 3)->nullable();
                $table->double('repair_sidewalk', 20, 3)->nullable();
                $table->double('repair_roadside', 20, 3)->nullable();
                $table->foreign('object_id')->references('id')->on('objects')->onDelete('cascade');
                
            });
        }
        
        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down()
        {
            Schema::dropIfExists('inspection_tasks');
        }
    }

<?php
    
    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;
    
    class CreateGeometryTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('geometry', function (Blueprint $table) {
                $table->id();
                $table->string('type');
                $table->longText('coordinates');
                $table->unsignedBigInteger('object_id');
                $table->foreign('object_id')->references('id')->on('objects')->onDelete('cascade');
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
            Schema::dropIfExists('geometry');
        }
    }

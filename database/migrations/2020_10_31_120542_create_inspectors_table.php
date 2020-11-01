<?php
    
    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;
    
    class CreateInspectorsTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('inspectors', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('user_id');
                $table->unsignedBigInteger('inspection_id');
                $table->boolean('with_car')->default(false);
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
                $table->foreign('inspection_id')->references('id')->on('inspections')->onDelete('cascade');
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
            Schema::dropIfExists('inspectors');
        }
    }

<?php
    
    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;
    
    class CreateFileListTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('file_list', function (Blueprint $table) {
                $table->id();
                $table->string('type_id');
                $table->text('url');
                $table->text('comment')->nullable();
                $table->date('create_date');
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
            Schema::dropIfExists('file_list');
        }
    }

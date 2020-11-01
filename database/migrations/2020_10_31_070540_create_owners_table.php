<?php
    
    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;
    
    class CreateOwnersTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            //Данные о балансодержателе
            Schema::create('owners', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('legal_person_id');
                $table->unsignedBigInteger('legal_person_version_id');
                $table->date('start_date');
                $table->date('end_date');
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
            Schema::dropIfExists('owners');
        }
    }

<?php
    
    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;
    
    class CreateRepairsInfoListTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('repairs_info_list', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->date('date')->nullable();
                $table->string('property')->nullable();
                $table->string('contract_organization')->nullable();
                $table->date('guarantee_date')->nullable();
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
            Schema::dropIfExists('repairs_info_list');
        }
    }

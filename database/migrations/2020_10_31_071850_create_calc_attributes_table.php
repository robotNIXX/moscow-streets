<?php
    
    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;
    
    class CreateCalcAttributesTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('calc_attributes', function (Blueprint $table) {
                $table->id();
                $table->double('inbound_area', 20, 3);         //Общая площадь в границах ОДХ, кв.м
                $table->double('total_area', 20, 3);           //Общая площадь в ТС, кв.м
                $table->double('tpu_area', 20, 3)->nullable(); //Общая площадь ТПУ, кв.м
                $table->double('gutters_length', 20, 3)->nullable();//Протяженность лотков, п.м
                $table->double('roadway_area', 20, 3)->nullable();
                $table->double('margin_area', 20, 3)->nullable();
                $table->double('footway_area', 20, 3)->nullable();
                $table->double('bound_stone_length', 20, 3)->nullable();
                $table->double('tram_rails_length', 20, 3)->nullable();
                $table->integer('traffic_signs_qty')->nullable();
                $table->integer('traff_light_qty')->nullable();
                $table->integer('station_qty')->nullable();
                $table->double('guiding_area', 20, 3)->nullable();
                $table->double('guiding_length', 20, 3)->nullable();
                $table->integer('guiding_qty')->nullable();
                $table->double('other_area', 20, 3)->nullable();
                $table->integer('engin_qty')->nullable();
                $table->double('bicycle_area', 20, 3)->nullable();
                $table->double('bicycle_length', 20, 3)->nullable();
                $table->double('cleaning_area', 20, 3)->nullable();
                $table->double('roadway_noprkg_manual_clean_area', 20, 3)->nullable();
                $table->double('roadway_noprkg_auto_clean_area', 20, 3)->nullable();
                $table->double('roadway_prkg_manual_clean_area', 20, 3)->nullable();
                $table->double('roadway_prkg_auto_clean_area', 20, 3)->nullable();
                $table->double('auto_footway_area', 20, 3)->nullable();
                $table->double('manual_footway_area', 20, 3)->nullable();
                $table->integer('station_number')->nullable();
                $table->double('station_area', 20, 3)->nullable();
                $table->double('bar_new_jersey', 20, 3)->nullable();
                $table->integer('buffer')->nullable();
                $table->integer('asperity')->nullable();
                $table->integer('sign')->nullable();
                $table->integer('info')->nullable();
                $table->double('cleaning_guiding_length', 20, 3)->nullable();
                $table->double('cleaning_guiding_area', 20, 3)->nullable();
                $table->integer('cleaning_guiding_qty')->nullable();
                $table->double('bar_antinoise', 20, 3)->nullable();
                $table->integer('pointer')->nullable();
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
            Schema::dropIfExists('calc_attributes');
        }
    }

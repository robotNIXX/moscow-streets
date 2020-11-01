<?php
    
    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;
    
    class CreateObjectsList extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('objects', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->unsignedBigInteger('object_id');                                                          //Идентификатор версии ОГХ
                $table->unsignedBigInteger('root_id');                                                            //Идентификатор ОГХ
                $table->double('distance', 20, 3)->nullable();                                            // Протяженность по оси, п.м
                $table->date('end_date');                                                                 //Дата окончания действия
                $table->double('snow_area', 20, 3)->nullable();                                                       //Площадь вывоза снега, кв.м
                $table->double('rotor_area', 20, 3)->nullable();                                                      //Площадь роторной перекидки, кв.м
                $table->date('start_date');                                                               //Дата начала действия
                $table->string('passport_num')->nullable();                                               //Номер паспорта
                $table->double('reagent_area', 20, 3)->nullable();                                                    //Площадь обработки реагентами, кв.м
                $table->double('layout_length', 20, 3)->nullable();                                       //Протяженность объекта по всем осям, п.м
                $table->date('passport_date')->nullable();                                                //Дата составления/ согласования паспорта
                $table->boolean('is_orphan_object')->default(false);                                      //Бесхозный объект
                $table->string('passport_draft_org')->nullable();                                         //Составитель паспорта
                $table->text('description')->nullable();                                                  //Описание
                $table->double('axis_length', 20, 3);                                                     //Протяженность осевой разделительной линии, п.м
                
//                Составные
                $table->unsignedBigInteger('ogh_object_type_id');                                         //Данные о типе ОГХ
                $table->foreign('ogh_object_type_id')->references('id')->on('ogh_types')->onDelete('restrict');
//                Данные о балансодержателе
                $table->unsignedBigInteger('owner_id');
                $table->foreign('owner_id')->references('id')->on('owners')->onDelete('restrict');
//                Данные об Учредителе/ГРБС
                $table->unsignedBigInteger('department_id');
                $table->foreign('department_id')->references('id')->on('departments')->onDelete('restrict');
//                Данные о заказчике
                $table->unsignedBigInteger('customer_id');
                $table->foreign('customer_id')->references('id')->on('customers')->onDelete('restrict');
//                Данные о картегории по уборке
                $table->unsignedBigInteger('clean_category_id');
                $table->foreign('clean_category_id')->references('id')->on('clean_categories')->onDelete('restrict');
//                Данные о подкартегории по уборке
                $table->unsignedBigInteger('clean_subcategory_id')->nullable();
                $table->foreign('clean_subcategory_id')->references('id')->on('clean_subcategories')->onDelete('restrict');
                
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
            Schema::dropIfExists('objects_list');
        }
    }

<?php
    
    
    namespace Database\Seeders;
    
    
    use App\Models\Region;
    use Illuminate\Database\Seeder;
    
    class RegionsSeeder extends Seeder
    {
        public function run()
        {
            $regions = [
                [
                    'name'      => 'КМ',
                    'shortname' => 'КМ'
                ],
                [
                    'name'      => 'Автомобильные дороги',
                    'shortname' => 'АД'
                ],
                [
                    'name'      => 'ВМ',
                    'shortname' => 'ВМ'
                ],
                [
                    'name'      => 'Центральный административный округ Москвы',
                    'shortname' => 'ЦАО'
                ],
                [
                    'name'      => 'Северный административный округ Москвы',
                    'shortname' => 'САО'
                ],
                [
                    'name'      => 'Северо-Восточный административный округ Москвы',
                    'shortname' => 'СВАО'
                ],
                [
                    'name'      => 'Восточный административный округ Москвы',
                    'shortname' => 'ВАО'
                ],
                [
                    'name'      => 'Юго-Восточный административный округ Москвы',
                    'shortname' => 'ЮВАО'
                ],
                [
                    'name'      => 'Южный административный округ Москвы',
                    'shortname' => 'ЮАО'
                ],
                [
                    'name'      => 'Юго-Западный административный округ Москвы',
                    'shortname' => 'ЮЗАО'
                ],
                [
                    'name'      => 'Западный административный округ Москвы',
                    'shortname' => 'ЗАО'
                ],
                [
                    'name'      => 'Северо-Западный административный округ Москвы',
                    'shortname' => 'СЗАО'
                ],
                [
                    'name'      => 'Зеленоградский административный округ Москвы',
                    'shortname' => 'ЗелАО'
                ],
                [
                    'name'      => 'Троицкий административный округ Москвы',
                    'shortname' => 'Троицкий'
                ],
                [
                    'name'      => 'Новомосковский административный округ Москвы',
                    'shortname' => 'Новомосковский'
                ],
                [
                    'name'      => 'Внуково',
                    'shortname' => 'Внуково'
                ]
            ];
            
            foreach ($regions as $region) {
                Region::create([
                    'name'      => $region['name'],
                    'short_name' => $region['shortname'],
                ]);
            }
            
        }
    }
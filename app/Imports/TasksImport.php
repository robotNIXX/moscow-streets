<?php
    
    
    namespace App\Imports;
    
    
    use App\Models\InspectionTask;
    use App\Repositories\InspectionTasksRepository;
    use App\Repositories\ParentObjectsRepository;
    use App\Repositories\RegionsRepository;
    use Maatwebsite\Excel\Concerns\ToModel;
    use Maatwebsite\Excel\Concerns\WithHeadingRow;
    
    class TasksImport implements ToModel, WithHeadingRow
    {
        protected $inspectionTasksRepository;
        protected $objectsRepository;
        protected $regions;
        
        public function __construct(ParentObjectsRepository $objectsRepository, InspectionTasksRepository $inspectionTasksRepository, $regions)
        {
            $this->inspectionTasksRepository = $inspectionTasksRepository;
            $this->objectsRepository         = $objectsRepository;
            $this->regions                   = $regions;
        }
        
        public function model(array $row)
        {
            if (isset($row[2])) {
                $object = $this->objectsRepository->findByField('name', $row[2]);
                if (count($object) > 0) {
                    $object = $object[0];
                    $region = empty($row[5]) ? 'АД' : $row[5];
                    return $this->inspectionTasksRepository->create([
                        'object_id'           => $object->id,
                        'start_repair_border' => $row[3],
                        'end_repair_border'   => $row[4],
                        'region'              => $region,
                        'reason'              => $row[6],
                        'program'             => $row[7],
                        'category'            => $row[8],
                        'repair_carriageway'  => $row[9],
                        'repair_sidewalk'     => $row[10],
                        'repair_roadside'     => $row[11],
                        'region_id'           => $this->regions[$region]
                    ]);
                }
            }
        }
        
        public function headingRow()
        {
            return 7;
        }
    }
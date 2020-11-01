<?php
    
    namespace App\Console\Commands;
    
    use App\Repositories\AttachedFilesRepository;
    use App\Repositories\CalcAttributesRepository;
    use App\Repositories\ChildObjectsRepository;
    use App\Repositories\CleanCategoriesRepository;
    use App\Repositories\CleanSubcategoriesRepository;
    use App\Repositories\CustomersRepository;
    use App\Repositories\DepartmentsRepository;
    use App\Repositories\GeometriesRepository;
    use App\Repositories\OghTypesRepository;
    use App\Repositories\OwnersRepository;
    use App\Repositories\ParentObjectsRepository;
    use Carbon\Carbon;
    use Illuminate\Console\Command;
    
    class StoreJSON extends Command
    {
        /**
         * The name and signature of the console command.
         *
         * @var string
         */
        protected $signature = 'ms:import-json {filename}';
        
        /**
         * The console command description.
         *
         * @var string
         */
        protected $description = 'Command description';
        
        /**
         * @var OghTypesRepository
         */
        protected $oghTypesRepository;
        
        protected $ownersRepository;
        protected $departmentsRepository;
        protected $customersRepository;
        
        protected $cleanCategoriesRepository;
        protected $cleanSubcategoriesRepository;
        
        protected $calcAttributesRepository;
        
        protected $geometryRepository;
        
        protected $parentObjectsRepository;
        
        protected $childObjectsRepository;
        
        protected $attachedFileRepository;
        
        /**
         * Create a new command instance.
         *
         * @return void
         */
        public function __construct(AttachedFilesRepository $attachedFilesRepository, ChildObjectsRepository $childObjectsRepository, GeometriesRepository $geometriesRepository, ParentObjectsRepository $parentObjectsRepository, CalcAttributesRepository $calcAttributesRepository, CleanCategoriesRepository $cleanCategoriesRepository, CleanSubcategoriesRepository $cleanSubcategoriesRepository, OghTypesRepository $oghTypesRepository, OwnersRepository $ownersRepository, DepartmentsRepository $departmentsRepository, CustomersRepository $customersRepository)
        {
            $this->oghTypesRepository           = $oghTypesRepository;
            $this->ownersRepository             = $ownersRepository;
            $this->customersRepository          = $customersRepository;
            $this->departmentsRepository        = $departmentsRepository;
            $this->cleanCategoriesRepository    = $cleanCategoriesRepository;
            $this->cleanSubcategoriesRepository = $cleanSubcategoriesRepository;
            $this->calcAttributesRepository     = $calcAttributesRepository;
            $this->geometryRepository           = $geometriesRepository;
            
            $this->parentObjectsRepository = $parentObjectsRepository;
            $this->childObjectsRepository  = $childObjectsRepository;
            $this->attachedFileRepository  = $attachedFilesRepository;
            parent::__construct();
        }
        
        /**
         * Execute the console command.
         *
         * @return int
         */
        public function handle()
        {
            
            $filename = $this->argument('filename');
            $f        = fopen(storage_path("app/data/" . $filename), "r");
            while (!feof($f)) {
                $line             = fgets($f);
                $data             = json_decode($line);
                $record = $this->parentObjectsRepository->findByField('name', $data->name);
                if (count($record) > 0) {
                    continue;
                }
                $oghType          = $this->oghTypesRepository->findOrCreate($data->ogh_object_type_id->ogh_object_type);
                $owner            = $this->ownersRepository->findOrCreate((array)$data->owner_id);
                $department       = $this->departmentsRepository->findOrCreate((array)$data->department_id);
                $customer         = $this->customersRepository->findOrCreate((array)$data->customer_id);
                $owner            = $this->ownersRepository->findOrCreate((array)$data->owner_id);
                $cleanCategory    = null;
                $cleanSubcategory = null;
                if (isset($data->clean_category_id->clean_category)) {
                    $cleanCategory = $this->cleanCategoriesRepository->findOrCreate($data->clean_category_id->clean_category);
                }
                if (isset($data->clean_subcategory_id->clean_category)) {
                    $cleanSubcategory = $this->cleanSubcategoriesRepository->findOrCreate($data->clean_subcategory_id->clean_category);
                }
                $calcAttributes         = (array)$data->calc_attribute;
                $repairs_info_list      = [];
                $repairs_info_list_plan = [];
                if (isset($data->repairs_info_list_plan)) {
                    $repairs_info_list_plan = $data->repairs_info_list_plan;
                }
                if (isset($data->repairs_info_list)) {
                    $repairs_info_list_plan = $data->repairs_info_list;
                }
                $attachedFiles = [];
                if (isset($data->file_list)) {
                    $attachedFiles = $data->file_list;
                }
                $tree                        = $data->tree;
                $object                      = $this->parentObjectsRepository->create(
                    [
                        "name"                 => $data->name,
                        "object_id"            => $data->object_id,
                        "root_id"              => $data->root_id,
                        "distance"             => $data->distance,
                        "end_date"             => $data->end_date,
                        "snow_area"            => !isset($data->snow_area) ? 0 : $data->snow_area,
                        "rotor_area"           => !isset($data->rotor_area) ? 0 : $data->rotor_area,
                        "start_date"           => $data->start_date,
                        "passport_num"         => !isset($data->passport_num) ? 0 : $data->passport_num,
                        "reagent_area"         => !isset($data->reagent_area) ? 0 : $data->reagent_area,
                        "layout_length"        => !isset($data->layout_length) ? 0 : $data->layout_length,
                        "passport_date"        => !isset($data->passport_date) ? Carbon::now() : $data->passport_date,
                        "is_orphan_object"     => !isset($data->is_orphan_object) ? 0 : $data->is_orphan_object,
                        "passport_draft_org"   => !isset($data->passport_draft_org) ? '' : $data->passport_draft_org,
                        "description"          => !isset($data->description) ? '' : $data->description,
                        "axis_length"          => !isset($data->axis_length) ? 0 : $data->axis_length,
                        "ogh_object_type_id"   => $oghType->id,
                        "owner_id"             => !$owner ? null : $owner->id,
                        "department_id"        => !$department ? null : $department->id,
                        "customer_id"          => !$customer ? null : $customer->id,
                        "clean_category_id"    => $cleanCategory->id,
                        "clean_subcategory_id" => !$cleanSubcategory ? null : $cleanSubcategory
                    ]
                );
                $calcAttributes['object_id'] = $object->id;
                $geometry                    = [];
                if ($data->geometry->type !== 'GeometryCollection') {
                    $geometry[] = [
                        'object_id'   => $object->id,
                        'type'        => $data->geometry->type,
                        'coordinates' => json_encode($data->geometry->coordinates)
                    ];
                } else {
                    foreach ($data->geometry->geometries as $gItem) {
                        $geometry[] = [
                            'object_id'   => $object->id,
                            'type'        => $gItem->type,
                            'coordinates' => json_encode($gItem->coordinates)
                        ];
                    }
                }
                
                if (count($geometry) > 0) {
                    foreach ($geometry as $gItem) {
                        $this->geometryRepository->create($gItem);
                    }
                }
                $this->calcAttributesRepository->create($calcAttributes);
                foreach ($data->tree as $item) {
                    $type   = $this->oghTypesRepository->findOrCreate($item->ogh_object_type_id->ogh_object_type);
                    $result = [
                        "root_id"            => $item->root_id,
                        "object_id"          => $item->object_id,
                        "ogh_object_type_id" => $type->id,
                        "parent_object_id"   => $object->id
                    ];
                    $this->childObjectsRepository->create($result);
                    
                }
                if (count($attachedFiles) > 0) {
                    foreach ($attachedFiles as $file) {
                        $this->attachedFileRepository->create(
                            [
                                "type_id"     => $file->type_id,
                                "url"         => $file->url,
                                "comment"     => isset($file->comment) ? $file->comment : "",
                                "create_date" => $file->create_date,
                                "object_id"   => $object->id,
                            ]
                        );
                    }
                }
            }
            fclose($f);
        }
    }

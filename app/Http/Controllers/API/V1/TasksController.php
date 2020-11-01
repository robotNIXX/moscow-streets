<?php
    
    
    namespace App\Http\Controllers\API\V1;
    
    
    use App\Http\FormRequests\Tasks\ImportTasksRequest;
    use App\Imports\TasksImport;
    use App\Repositories\InspectionTasksRepository;
    use App\Repositories\ParentObjectsRepository;
    use App\Repositories\RegionsRepository;
    use App\Transformers\TaskTransformer;
    use Maatwebsite\Excel\Facades\Excel;
    
    class TasksController extends APIController
    {
        protected $inspectionTasksRepository;
        protected $objectsRepository;
        protected $regionsRepository;
        
        public function __construct(RegionsRepository $regionsRepository, InspectionTasksRepository $inspectionTasksRepository, ParentObjectsRepository $objectsRepository)
        {
            $this->regionsRepository         = $regionsRepository;
            $this->inspectionTasksRepository = $inspectionTasksRepository;
            $this->objectsRepository         = $objectsRepository;
        }
        
        public function import(ImportTasksRequest $request)
        {
            try {
                $regions = $this->regionsRepository->all()->pluck('id', 'short_name')->toArray();
                $file    = $request->file('file');
                $path    = $file->store('excels');
                Excel::import(new TasksImport($this->objectsRepository, $this->inspectionTasksRepository, (array)$regions), storage_path("app/{$path}"));
                
                return $this->response()->noContent();
            } catch (\Throwable $throwable) {
                return $this->response()->errorInternal("Ошибка импорта файла. {$throwable->getMessage()}");
            }
        }
        
        public function index()
        {
            $tasks = $this->inspectionTasksRepository->all();
            return $this->response->collection($tasks, new TaskTransformer);
        }
        
        public function byAssignee() {
        
        }
    }
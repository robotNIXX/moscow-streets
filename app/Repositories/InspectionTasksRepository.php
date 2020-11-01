<?php
    
    
    namespace App\Repositories;
    
    
    use App\Models\InspectionTask;
    use Prettus\Repository\Eloquent\BaseRepository;
    
    class InspectionTasksRepository extends BaseRepository
    {
        public function model()
        {
            return InspectionTask::class;
        }
        
    }
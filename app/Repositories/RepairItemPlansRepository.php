<?php
    
    
    namespace App\Repositories;
    
    
    use App\Models\RepairItemPlan;
    use Prettus\Repository\Eloquent\BaseRepository;
    
    class RepairItemPlansRepository extends BaseRepository
    {
        public function model()
        {
            return RepairItemPlan::class;
        }
        
    }
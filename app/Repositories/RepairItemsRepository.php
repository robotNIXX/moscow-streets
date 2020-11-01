<?php
    
    
    namespace App\Repositories;
    
    
    use App\Models\RepairItem;
    use Prettus\Repository\Eloquent\BaseRepository;
    
    class RepairItemsRepository extends BaseRepository
    {
        public function model()
        {
            return RepairItem::class;
        }
        
    }
<?php
    
    
    namespace App\Repositories;
    
    
    use App\Models\Region;
    use Prettus\Repository\Eloquent\BaseRepository;
    
    class RegionsRepository extends BaseRepository
    {
        public function model()
        {
            return Region::class;
        }
        
    }
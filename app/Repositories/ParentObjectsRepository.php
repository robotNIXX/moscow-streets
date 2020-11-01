<?php
    
    
    namespace App\Repositories;
    
    
    use App\Models\ParentObject;
    use Prettus\Repository\Eloquent\BaseRepository;
    
    class ParentObjectsRepository extends BaseRepository
    {
        public function model()
        {
            return ParentObject::class;
        }
        
    }
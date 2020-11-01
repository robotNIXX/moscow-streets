<?php
    
    
    namespace App\Repositories;
    
    
    use App\Models\ChildObject;
    use Prettus\Repository\Eloquent\BaseRepository;
    
    class ChildObjectsRepository extends BaseRepository
    {
        public function model()
        {
            return ChildObject::class;
        }
        
    }
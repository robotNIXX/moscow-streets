<?php
    
    
    namespace App\Repositories;
    
    
    use App\Models\Geometry;
    use Prettus\Repository\Eloquent\BaseRepository;
    
    class GeometriesRepository extends BaseRepository
    {
        public function model()
        {
            return Geometry::class;
        }
        
    }
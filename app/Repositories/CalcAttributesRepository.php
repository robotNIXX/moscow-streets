<?php
    
    
    namespace App\Repositories;
    
    
    use App\Models\CalcAttributes;
    use Prettus\Repository\Eloquent\BaseRepository;
    
    class CalcAttributesRepository extends BaseRepository
    {
        public function model()
        {
            return CalcAttributes::class;
        }
        
    }
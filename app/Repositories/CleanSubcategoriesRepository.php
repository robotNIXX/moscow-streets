<?php
    
    
    namespace App\Repositories;
    
    
    use App\Models\CleanSubcategory;
    use Prettus\Repository\Eloquent\BaseRepository;
    
    class CleanSubcategoriesRepository extends BaseRepository
    {
        public function model()
        {
            return CleanSubcategory::class;
        }
        
        public function findOrCreate($code)
        {
            $result = $this->findByField('code', $code);
            if (count($result) > 0) {
                return $result[0];
            }
            
            return $this->create([
                'code' => $code
            ]);
        }
        
    }
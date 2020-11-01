<?php
    
    
    namespace App\Repositories;
    
    
    use App\Models\CleanCategory;
    use Prettus\Repository\Eloquent\BaseRepository;
    
    class CleanCategoriesRepository extends BaseRepository
    {
        public function model()
        {
            return CleanCategory::class;
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
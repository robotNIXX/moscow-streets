<?php
    
    
    namespace App\Repositories;
    
    
    use App\Models\Owner;
    use Prettus\Repository\Eloquent\BaseRepository;
    
    class OwnersRepository extends BaseRepository
    {
        public function model()
        {
            return Owner::class;
        }
        
        public function findOrCreate($attributes) {
            $result = $this->findByField('legal_person_id', $attributes['legal_person_id']);
            if (count($result) > 0) {
                return $result[0];
            }
            
            return $this->create($attributes);
        }
        
    }
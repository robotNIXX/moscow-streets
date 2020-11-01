<?php
    
    
    namespace App\Repositories;
    
    
    use App\Models\OghType;
    use Prettus\Repository\Eloquent\BaseRepository;
    
    class OghTypesRepository extends BaseRepository
    {
        public function model()
        {
            return OghType::class;
        }
        
        public function findOrCreate($ogh_object_type)
        {
            $result = $this->findByField('ogh_object_type', $ogh_object_type);
            if (count($result) > 0) {
                return $result[0];
            }
            
            return $this->create([
                'ogh_object_type' => $ogh_object_type
            ]);
        }
        
    }
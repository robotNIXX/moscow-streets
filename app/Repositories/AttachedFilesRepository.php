<?php
    
    
    namespace App\Repositories;
    
    
    use App\Models\AttachedFile;
    use Prettus\Repository\Eloquent\BaseRepository;
    
    class AttachedFilesRepository extends BaseRepository
    {
        public function model()
        {
            return AttachedFile::class;
        }
        
    }
<?php
    
    
    namespace App\Models;
    
    
    use Illuminate\Database\Eloquent\Model;
    
    class InspectionTask extends Model
    {
        protected $table = 'inspection_tasks';
        
        public $timestamps = true;
        
        protected $fillable = [
            'object_id',
            'start_repair_border',
            'end_repair_border',
            'region',
            'reason',
            'program',
            'category',
            'repair_carriageway',
            'repair_sidewalk',
            'repair_roadside',
            'region_id'
        ];
        
        public function parentObject()
        {
            return $this->belongsTo(ParentObject::class, 'object_id');
        }
    }
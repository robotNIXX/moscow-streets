<?php
    
    
    namespace App\Models;
    
    
    use Illuminate\Database\Eloquent\Model;
    
    class ChildObject extends Model
    {
        protected $table = "child_objects";
        
        protected $fillable = [
            "ogh_object_type_id",
            "object_id",
            "root_id",
            "start_date",
            "end_date",
            "parent_object_id"
        ];
    }
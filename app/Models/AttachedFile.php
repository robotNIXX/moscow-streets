<?php
    
    
    namespace App\Models;
    
    
    use Illuminate\Database\Eloquent\Model;
    
    class AttachedFile extends Model
    {
        protected $table = "file_list";
        
        protected $fillable = [
            "type_id",
            "url",
            "comment",
            "create_date",
            "object_id"
        ];
    }
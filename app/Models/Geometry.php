<?php
    
    
    namespace App\Models;
    
    
    use Illuminate\Database\Eloquent\Model;

    class Geometry extends Model
    {
        protected $table = "geometry";
        
        protected $fillable = [
            "type",
            "coordinates",
            "object_id"
        ];
    }
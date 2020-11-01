<?php
    
    
    namespace App\Models;
    
    
    use Illuminate\Database\Eloquent\Model;
    
    class OghType extends Model
    {
        protected $table = "ogh_types";
        
        protected $fillable = ["ogh_object_type"];
    }
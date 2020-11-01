<?php
    
    
    namespace App\Models;
    
    
    use Illuminate\Database\Eloquent\Model;

    class CleanCategory extends Model
    {
        protected $table = 'clean_categories';
        
        protected $fillable = ["code"];
    }
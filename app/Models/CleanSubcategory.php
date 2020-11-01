<?php
    
    
    namespace App\Models;
    
    
    use Illuminate\Database\Eloquent\Model;

    class CleanSubcategory extends Model
    {
        protected $table = 'clean_subcategories';
    
        protected $fillable = ["code"];
    }
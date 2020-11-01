<?php
    
    
    namespace App\Models;
    
    
    use Illuminate\Database\Eloquent\Model;
    
    class Customer extends Model
    {
        protected $table = 'customers';
        
        protected $fillable = [
            "legal_person_id",
            "legal_person_version_id",
            "start_date",
            "end_date"
        ];
    }
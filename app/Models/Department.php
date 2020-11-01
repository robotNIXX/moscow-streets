<?php
    
    
    namespace App\Models;
    
    
    use Illuminate\Database\Eloquent\Model;

    class Department extends Model
    {
        protected $table = 'departments';
    
        protected $fillable = [
            "legal_person_id",
            "legal_person_version_id",
            "start_date",
            "end_date"
        ];
    }
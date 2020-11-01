<?php
    
    
    namespace App\Models;
    
    
    use Illuminate\Database\Eloquent\Model;

    class RepairItem extends Model
    {
        protected $table = 'repairs_info_list';
        
        protected $fillable = [
            "name",
            "date",
            "property",
            "contract_organization",
            "guarantee_date",
            "object_id"
        ];
    }
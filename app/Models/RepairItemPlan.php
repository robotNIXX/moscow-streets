<?php
    
    
    namespace App\Models;
    
    
    use Illuminate\Database\Eloquent\Model;

    class RepairItemPlan extends Model
    {
        protected $table = 'repairs_plan';
    
        protected $fillable = [
            "name",
            "date",
            "property",
            "plan_time",
            "object_id"
        ];
    }
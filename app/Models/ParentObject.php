<?php
    
    
    namespace App\Models;
    
    
    use Illuminate\Database\Eloquent\Model;
    
    class ParentObject extends Model
    {
        protected $table = "objects";
        
        protected $fillable = [
            "name",
            "object_id",
            "root_id",
            "distance",
            "end_date",
            "snow_area",
            "rotor_area",
            "start_date",
            "passport_num",
            "reagent_area",
            "layout_length",
            "passport_date",
            "is_orphan_object",
            "passport_draft_org",
            "description",
            "axis_length",
            "ogh_object_type_id",
            "owner_id",
            "department_id",
            "customer_id",
            "clean_category_id",
            "clean_subcategory_id",
            "calc_attributes_id",
        ];
    }
<?php
    
    
    namespace App\Models;
    
    
    use Illuminate\Database\Eloquent\Model;
    
    class CalcAttributes extends Model
    {
        protected $table = 'calc_attributes';
        
        protected $fillable = [
            "inbound_area",
            "total_area",
            "tpu_area",
            "gutters_length",
            "roadway_area",
            "margin_area",
            "footway_area",
            "bound_stone_length",
            "tram_rails_length",
            "traffic_signs_qty",
            "traff_light_qty",
            "station_qty",
            "guiding_area",
            "guiding_length",
            "guiding_qty",
            "other_area",
            "engin_qty",
            "bicycle_area",
            "bicycle_length",
            "cleaning_area",
            "roadway_noprkg_manual_clean_area",
            "roadway_noprkg_auto_clean_area",
            "roadway_prkg_manual_clean_area",
            "roadway_prkg_auto_clean_area",
            "auto_footway_area",
            "manual_footway_area",
            "station_number",
            "station_area",
            "bar_new_jersey",
            "buffer",
            "asperity",
            "sign",
            "info",
            "cleaning_guiding_length",
            "cleaning_guiding_area",
            "cleaning_guiding_qty",
            "bar_antinoise",
            "pointer",
            "object_id"
        ];
    }
<?php
    
    namespace App\Transformers;
    
    use App\Models\InspectionTask;
    use Carbon\Carbon;
    use League\Fractal\TransformerAbstract;
    
    /**
     * Class TaskTransformer.
     *
     * @package namespace App\Transformers;
     */
    class TaskTransformer extends TransformerAbstract
    {
        /**
         * Transform the Task entity.
         *
         * @param InspectionTask $model
         *
         * @return array
         */
        public function transform(InspectionTask $model)
        {
            return [
                'id'                  => (int)$model->id,
                'object_id'           => $model->object_id,
                'start_repair_border' => $model->start_repair_border,
                'end_repair_border'   => $model->end_repair_border,
                'region'              => $model->region,
                'reason'              => $model->reason,
                'program'             => $model->program,
                'category'            => $model->category,
                'repair_carriageway'  => $model->repair_carriageway,
                'repair_sidewalk'     => $model->repair_sidewalk,
                'repair_roadside'     => $model->repair_roadside,
                'created_at'          => $this->getCreatedDate($model),
                'title'               => $this->getName($model)
            ];
        }
        
        protected function getName($model)
        {
            return $model->parentObject->name;
        }
        
        protected function getCreatedDate($model)
        {
            $date = new Carbon($model->created_at);
            
            return $date->format('d-m-Y H:i:s');
        }
    }

<?php
    
    
    namespace App\Http\FormRequests\Tasks;
    
    
    use App\Http\FormRequests\IRFormRequest;
    
    class ImportTasksRequest extends IRFormRequest
    {
        public function rules()
        {
            return [
                'file' => 'required|file'
            ];
        }
        
        public function authorize()
        {
            return true;
        }
        
    }
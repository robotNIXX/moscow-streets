<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use Spatie\Permission\Models\Role;

/**
 * Class RolesTransformer.
 *
 * @package namespace App\Transformers;
 */
class RolesTransformer extends TransformerAbstract
{
    /**
     * Transform the RolesTransformer entity.
     *
     * @param Role $model
     *
     * @return array
     */
    public function transform(Role $model)
    {
        return [
            'id' => (int)$model->id,
            'name' => $model->name
        ];
    }
}

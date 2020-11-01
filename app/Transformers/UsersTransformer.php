<?php


namespace App\Transformers;


use App\Models\User;
use League\Fractal\TransformerAbstract;
use Spatie\Permission\Models\Role;

class UsersTransformer extends TransformerAbstract
{
    public function transform(User $user)
    {
        return [
            'id' => $user->id,
            'name' => $user->name,
            'roles' => $this->roles($user)
        ];
    }

    protected function roles(User $user)
    {
        $roles = $user->getRoleNames();

        return $roles;
    }
}

<?php

namespace Domain\User\Actions;

use Domain\User\DTOs\UserDTO;
use Domain\User\Models\User;
use Domain\Roles\Consts\Roles;

class GetUserRedirect
{
    public function __invoke(User $user) : string
    {
        switch($user->role_id)
        {
            case Roles::USER:
                return route('user.index');
            case Roles::ADMIN:
                return route('admin.index');
            default:
                throw new \Exception('No User Type');
        }
    }
}
<?php

namespace Domain\User\Actions;

use Domain\User\DTOs\UserDTO;
use Domain\User\Models\User;

class AuthenticateUserAction
{
    public function __invoke(User $user)
    {
        auth()->login($user);
    }
}
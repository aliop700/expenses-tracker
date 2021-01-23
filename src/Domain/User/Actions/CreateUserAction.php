<?php

namespace Domain\User\Actions;

use Domain\User\DTOs\UserDTO;
use Domain\User\Models\User;

class CreateUserAction
{
    public function __invoke(UserDTO $userDTO) : User
    {
        $user = new User;

        $user->name = $userDTO->name;
        $user->email = $userDTO->email;
        $user->country_code = $userDTO->country_code;
        $user->phone = $userDTO->phone;
        $user->birth_date = $userDTO->birth_date;
        $user->password = $userDTO->password;
        $user->currency_id = $userDTO->currency;

        if(!empty($userDTO->role_id))
            $user->role_id = $userDTO->role_id;

        $user->save();

        return $user;
        
    }
}
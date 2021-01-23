<?php

namespace Domain\User\Actions;

class UserLogoutAction
{
    public function __invoke() : void
    {
        auth()->logout();
    }
}
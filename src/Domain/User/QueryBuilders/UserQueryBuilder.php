<?php

namespace Domain\User\QueryBuilders;

use Illuminate\Database\Eloquent\Builder;
use Support\Security\PasswordHasher;

class UserQueryBuilder extends Builder
{
    public function verify($email, $password): self
    {
    
        $hashed = PasswordHasher::hash($password);
        
        return $this->where('email', $email)->where('password', $hashed);
    
    }
}
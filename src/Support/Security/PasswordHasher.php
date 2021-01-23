<?php 

namespace Support\Security;

class PasswordHasher
{
    public static function hash($password) 
    {
        return md5($password);
    }
}
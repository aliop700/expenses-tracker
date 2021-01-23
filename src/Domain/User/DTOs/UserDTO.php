<?php 

namespace Domain\User\DTOs;

use Support\DTO\DTO;
use Domain\Roles\Consts\Roles;

class UserDTO extends DTO 
{
    public static function requiredParams() : array 
    {
        return [
            'name' , 
            'email', 
            'country_code', 
            'phone',
            'birth_date',
            'password',
            'currency'
        ];
    }
    
    public static function fromArray(array $params, $role_id = Roles::USER)
    {
        $UserDTO = new self($params);
        
        $UserDTO->role_id = $role_id;
        
        return $UserDTO;
    }
}
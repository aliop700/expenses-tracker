<?php 

namespace Domain\Transactions\DTOs;

use Support\DTO\DTO;
use Domain\Roles\Consts\Roles;

class TransactionDTO extends DTO 
{
    public static function requiredParams() : array 
    {
        return [
            'title',
            'description',
            'amount',
            'category_id',
        ];
    }

    public static function fromArray(array $params)
    {
        $params['description'] = abs($params['description']);

        return new self($params);
    }
    
}
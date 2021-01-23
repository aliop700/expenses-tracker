<?php 

namespace Domain\Category\DTOs;

use Support\DTO\DTO;

class CategoryDTO extends DTO 
{
    public static function requiredParams() : array 
    {
        return [
            'description' , 
            'categories_types_id', 
            'title', 
        ];
    }
    
}
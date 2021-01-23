<?php

namespace Domain\Category\Models;

use Illuminate\Database\Eloquent\Model;
use Domain\User\Models\User;
use Domain\Category\Models\CategoryType;
use Domain\Category\Extra\CategoryButton;

class Category extends Model
{
    protected $table = 'categories';

    public function buttons()
    {
        return new CategoryButton($this); 
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function type()
    {
        return $this->belongsTo(CategoryType::class, 'categories_types_id');
    }

}

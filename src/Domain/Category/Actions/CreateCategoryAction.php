<?php

namespace Domain\Category\Actions;

use Domain\Category\Models\Category;
use Domain\Category\DTOs\CategoryDTO;

class CreateCategoryAction
{
    public function __invoke(CategoryDTO $categoryDTO) : Category
    {
        $category = new Category;

        $category->description          = $categoryDTO->description;
        $category->categories_types_id  = $categoryDTO->categories_types_id;
        $category->title                = $categoryDTO->title;

        auth()->user()->categories()->save($category);

        return $category;

    }
}
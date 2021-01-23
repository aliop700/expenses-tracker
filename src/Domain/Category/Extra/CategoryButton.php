<?php 

namespace Domain\Category\Extra;

class CategoryButton
{
    protected $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function edit()
    {
        return "<a href='#'>edit</a>";
    }

    public function delete()
    {
        return "<a href='#'>delete</a>";
    }
}
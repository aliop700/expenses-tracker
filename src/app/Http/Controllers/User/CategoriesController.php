<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Domain\Category\DTOs\CategoryDTO;
use Domain\Category\Models\Category;
use Domain\Category\Actions\CreateCategoryAction;
use App\Http\Requests\CreateCategoryRequest;

class CategoriesController extends Controller
{
    public function store(CreateCategoryRequest $request)
    {
        
        $valdiated = $request->all();

        $categoryDTO = CategoryDTO::fromArray($valdiated);

        try {
            
            $category = (new CreateCategoryAction)($categoryDTO);

        }catch(\Exception $e){
            return response()->json(['errors'   =>  $e->getMessage()],500);
        }

        return response()->json(['data' => $category], 200);

    }
}

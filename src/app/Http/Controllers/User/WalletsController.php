<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Domain\Category\Models\Category;
use Domain\Category\Models\CategoryType;
use Domain\Transactions\Models\Transaction;

class WalletsController extends Controller
{
    public function index()
    {
        $categories = auth()->user()->categories;
        
        $categoriesId = $categories->pluck('id')->toArray();
        
        $categories_types = CategoryType::all();
        
        $transactions = Transaction::whereIn('category_id',$categoriesId)->with('category')->get();

        return view('wallets.index',compact('categories','categories_types','transactions'));   
    }
}

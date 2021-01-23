<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Domain\Currency\Actions\GetAllCurrenciesAction;

class CurrenciesController extends Controller
{
    public function index()
    {
        
        $currencies = (new GetAllCurrenciesAction)();

        return response()->json($currencies, 200);
    }
}

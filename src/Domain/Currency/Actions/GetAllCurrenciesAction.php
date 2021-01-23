<?php 

namespace Domain\Currency\Actions;

use Domain\Currency\Models\Currency;

class GetAllCurrenciesAction 
{

    public function __invoke()
    {
        
        $currencies = Currency::all();

        return $currencies;
        
    }

}
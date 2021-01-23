<?php

namespace Domain\Transactions\Collections;

use Illuminate\Database\Eloquent\Collection;

class TransactionCollection extends Collection
{
    public function positiveSum()
    {
        return $this->filter(function($item){
            return $item->amount >= 0;
        })->sum('amount');
    }

    public function negativeSum()
    {
        return $this->filter(function($item){
            return $item->amount < 0;
        })->sum('amount');
    }
}
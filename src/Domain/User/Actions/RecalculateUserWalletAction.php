<?php 

namespace Domain\User\Actions;

use Domain\User\Models\User;
use Domain\Transactions\Models\Transaction;

class RecalculateUserWalletAction
{
    public function __invoke($user)
    {
        
        $transactions = $user->transactions;

        $negativeSum = $transactions->negativeSum();

        $positiveSum = $transactions->positiveSum();


        $user->total_incomes = $positiveSum;

        $user->total_expenses = $negativeSum;

        $user->save();
        
    }
}
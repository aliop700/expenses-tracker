<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateTransactionRequest;
use Illuminate\Http\Request;
use Domain\Transactions\DTOs\TransactionDTO;
use Domain\Transactions\Actions\CreateTransactionAction;

class TransactionsController extends Controller
{
    public function store(CreateTransactionRequest $request)
    {
        
        $validated = $request->all();
        
        $TransactionDTO = TransactionDTO::fromArray($validated);
        
        try {
            
            $transaction = (new CreateTransactionAction)($TransactionDTO);

        }catch(\Exception $e){
            dd($e->getMessage());
        }


    }
}

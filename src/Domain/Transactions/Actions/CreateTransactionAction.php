<?php 

namespace Domain\Transactions\Actions;

use Domain\Transactions\DTOs\TransactionDTO;
use Domain\Transactions\Models\Transaction;
use Domain\Category\Models\Category;
use App\Events\TransactionCreated;

class CreateTransactionAction
{
    public function __invoke(TransactionDTO $dto)
    {
        $category = Category::whereId($dto->category_id)->with('type')->first()->toArray();

        $isPositive = $category['type']['is_postive'];
        
        if(!$isPositive)
            $dto->amount *= -1;

        $transaction = new Transaction;
        
        $transaction->amount = $dto->amount;
        $transaction->description = $dto->description;
        $transaction->title = $dto->title;
        $transaction->category_id = $dto->category_id;
        
        $transaction->save();

        event(new TransactionCreated);


    }
}
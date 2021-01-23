<?php 

namespace Domain\Transactions\Models;

use Illuminate\Database\Eloquent\Model;
use Domain\Category\Models\Category;
use Domain\Transactions\Collections\TransactionCollection;

class Transaction extends Model
{
    protected $table = 'transactions';

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function newCollection(array $models = [])
    {
        return new TransactionCollection($models);
    }
}
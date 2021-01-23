<?php

namespace Domain\User\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Domain\User\QueryBuilders\UserQueryBuilder;
use Support\Security\PasswordHasher;
use Domain\Category\Models\Category;
use Domain\Transactions\Models\Transaction;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = PasswordHasher::hash($password);
    }

    public function setBirthDateAttribute($birth_date)
    {
        $this->attributes['birth_date'] = \Carbon\Carbon::createFromFormat('d/m/Y', $birth_date)->format('Y-m-d');
    }

    public function getBirthDateAttribute($birth_date)
    {
        return \Carbon\Carbon::createFromFormat('Y-m-d', $birth_date)->format('d/m/Y');
    }

    public function newEloquentBuilder($query) : UserQueryBuilder
    {
        return new UserQueryBuilder($query);
    }

    public function categories()
    {
        return $this->hasMany(Category::class, 'user_id', 'id');

    }

    public function transactions()
    {
        return $this->hasManyThrough(
            Transaction::class,
            Category::class
        );
    }
}

<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    
        DB::table('users')->insert([
            'name'  =>  'Ali Safi',
            'email' =>  'ali@safi.com',
            'password'  =>  \Support\Security\PasswordHasher::hash('12345678a'),
            'birth_date'    =>'1995-02-28',
            'country_code'  =>'+962',
            'phone' =>  '12345678',
            'role_id'   =>  \Domain\Roles\Consts\Roles::ADMIN,
            'currency_id'   =>1
        ]);
    }
}

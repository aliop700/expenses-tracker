<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('currencies')->insert([
            'currency_name' => 'American Dollar',
            'currency_symbol' => 'USD',
        ]);
        DB::table('currencies')->insert([
            'currency_name' => 'Jordanian Dinar',
            'currency_symbol' => 'JOD',
        ]);
        DB::table('currencies')->insert([
            'currency_name' => 'Saudi Riyal',
            'currency_symbol' => 'SAR',
        ]);
    }
}
